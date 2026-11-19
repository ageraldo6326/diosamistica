<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Volt\Volt;

it('renders the public horoscope experience', function () {
    $response = $this->get(route('horoscope'));

    $response
        ->assertOk()
        ->assertSeeText('Tu horóscopo, creado para este momento')
        ->assertSeeText('Elige tu signo');
});

it('never exposes the AI credential or its environment variable name', function () {
    config()->set('services.openai.key', 'sk-private-test-credential');

    $response = $this->get(route('horoscope'));

    $response
        ->assertOk()
        ->assertDontSee('OPENAI_API_KEY')
        ->assertDontSee('sk-private-test-credential');
});

it('links to the horoscope from the home navigation', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSee(route('horoscope'), escape: false)
        ->assertSeeText('Horóscopo IA');
});

it('generates a structured daily horoscope with OpenAI', function () {
    $horoscope = [
        'title' => 'La claridad encuentra su cauce',
        'overview' => 'Hoy puedes avanzar con serenidad.',
        'energy' => 'Tu energía pide enfoque.',
        'love' => 'Escucha antes de responder.',
        'work' => 'Ordena una prioridad pendiente.',
        'guidance' => 'Da un paso pequeño y concreto.',
        'affirmation' => 'Confío en mi ritmo y mi visión.',
        'lucky' => ['color' => 'Dorado', 'numbers' => [3, 8, 21]],
    ];

    config()->set('services.openai.key', 'test-key');
    config()->set('services.openai.base_url', 'https://api.openai.com/v1');
    config()->set('services.openai.model', 'gpt-6.2-sol');
    Http::preventStrayRequests();
    Http::fake([
        'api.openai.com/v1/responses' => Http::response([
            'output' => [[
                'type' => 'message',
                'content' => [[
                    'type' => 'output_text',
                    'text' => json_encode($horoscope, JSON_THROW_ON_ERROR),
                ]],
            ]],
        ]),
    ]);

    Volt::test('horoscope-generator')
        ->set('sign', 'leo')
        ->set('focus', 'crecimiento')
        ->set('name', 'Luna')
        ->set('intention', 'Tomar una decisión con calma')
        ->call('generate')
        ->assertHasNoErrors()
        ->assertSet('reading.title', 'La claridad encuentra su cauce')
        ->assertSeeText('Confío en mi ritmo y mi visión.');

    Http::assertSent(function (Request $request): bool {
        $payload = $request->data();

        return $request->url() === 'https://api.openai.com/v1/responses'
            && $request->hasHeader('Authorization', 'Bearer test-key')
            && $payload['model'] === 'gpt-6.2-sol'
            && $payload['store'] === false
            && $payload['text']['format']['type'] === 'json_schema'
            && str_contains($payload['input'][1]['content'], 'Crecimiento personal');
    });
});

it('requires a valid zodiac sign before requesting a reading', function () {
    config()->set('services.openai.key', 'test-key');
    Http::preventStrayRequests();

    Volt::test('horoscope-generator')
        ->set('sign', 'not-a-sign')
        ->call('generate')
        ->assertHasErrors(['sign']);

    Http::assertNothingSent();
});

it('explains when the AI connection is not configured', function () {
    config()->set('services.openai.key');
    Http::preventStrayRequests();

    Volt::test('horoscope-generator')
        ->set('sign', 'piscis')
        ->call('generate')
        ->assertHasErrors(['horoscope'])
        ->assertSeeText('estará disponible cuando se configure');

    Http::assertNothingSent();
});
