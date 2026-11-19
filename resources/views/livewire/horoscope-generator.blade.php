<?php

use App\Services\OpenAiHoroscopeGenerator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $sign = '';

    public string $focus = 'general';

    public string $name = '';

    public string $intention = '';

    public string $dateLabel = '';

    public bool $aiAvailable = false;

    /** @var array<string, mixed>|null */
    public ?array $reading = null;

    public function mount(OpenAiHoroscopeGenerator $generator): void
    {
        $this->dateLabel = now()->locale('es')->isoFormat('dddd D [de] MMMM');
        $this->aiAvailable = $generator->isConfigured();
    }

    public function generate(OpenAiHoroscopeGenerator $generator): void
    {
        $validated = $this->validate([
            'sign' => ['required', Rule::in(array_keys($this->signs()))],
            'focus' => ['required', Rule::in(array_keys($this->focuses()))],
            'name' => ['nullable', 'string', 'max:60'],
            'intention' => ['nullable', 'string', 'max:280'],
        ], [
            'sign.required' => 'Elige tu signo para abrir la lectura.',
            'sign.in' => 'El signo seleccionado no es válido.',
            'focus.required' => 'Elige el enfoque de tu lectura.',
            'focus.in' => 'El enfoque seleccionado no es válido.',
            'name.max' => 'Tu nombre no puede superar los 60 caracteres.',
            'intention.max' => 'Tu intención no puede superar los 280 caracteres.',
        ]);

        if (! $generator->isConfigured()) {
            $this->addError('horoscope', 'La lectura con IA estará disponible cuando se configure la conexión de OpenAI.');

            return;
        }

        $rateLimitKey = 'horoscope:'.request()->ip();

        if (RateLimiter::tooManyAttempts($rateLimitKey, 6)) {
            $minutes = max(1, (int) ceil(RateLimiter::availableIn($rateLimitKey) / 60));
            $this->addError('horoscope', "Has abierto varias lecturas. Inténtalo de nuevo en {$minutes} min.");

            return;
        }

        RateLimiter::increment($rateLimitKey, decaySeconds: 3600);
        $this->resetErrorBag('horoscope');
        $this->reading = null;

        try {
            $this->reading = $generator->generate(
                sign: $this->signs()[$validated['sign']]['name'],
                focus: $this->focuses()[$validated['focus']],
                name: filled($validated['name']) ? $validated['name'] : null,
                intention: filled($validated['intention']) ? $validated['intention'] : null,
                date: now()->toDateString(),
            );
        } catch (\Throwable $exception) {
            report($exception);
            $this->addError('horoscope', 'No pudimos abrir tu lectura en este momento. Respira y vuelve a intentarlo en unos minutos.');
        }
    }

    /**
     * @return array<string, array{name: string, symbol: string, dates: string}>
     */
    public function signs(): array
    {
        return [
            'aries' => ['name' => 'Aries', 'symbol' => '♈', 'dates' => '21 mar — 19 abr'],
            'tauro' => ['name' => 'Tauro', 'symbol' => '♉', 'dates' => '20 abr — 20 may'],
            'geminis' => ['name' => 'Géminis', 'symbol' => '♊', 'dates' => '21 may — 20 jun'],
            'cancer' => ['name' => 'Cáncer', 'symbol' => '♋', 'dates' => '21 jun — 22 jul'],
            'leo' => ['name' => 'Leo', 'symbol' => '♌', 'dates' => '23 jul — 22 ago'],
            'virgo' => ['name' => 'Virgo', 'symbol' => '♍', 'dates' => '23 ago — 22 sep'],
            'libra' => ['name' => 'Libra', 'symbol' => '♎', 'dates' => '23 sep — 22 oct'],
            'escorpio' => ['name' => 'Escorpio', 'symbol' => '♏', 'dates' => '23 oct — 21 nov'],
            'sagitario' => ['name' => 'Sagitario', 'symbol' => '♐', 'dates' => '22 nov — 21 dic'],
            'capricornio' => ['name' => 'Capricornio', 'symbol' => '♑', 'dates' => '22 dic — 19 ene'],
            'acuario' => ['name' => 'Acuario', 'symbol' => '♒', 'dates' => '20 ene — 18 feb'],
            'piscis' => ['name' => 'Piscis', 'symbol' => '♓', 'dates' => '19 feb — 20 mar'],
        ];
    }

    /** @return array<string, string> */
    public function focuses(): array
    {
        return [
            'general' => 'Panorama general',
            'amor' => 'Amor y vínculos',
            'trabajo' => 'Trabajo y abundancia',
            'crecimiento' => 'Crecimiento personal',
        ];
    }
}; ?>

<div class="grid gap-8 xl:grid-cols-[minmax(0,1.08fr)_minmax(22rem,0.92fr)] xl:items-start">
    <form wire:submit="generate" class="rounded-[2rem] border border-mystic-lavender/15 bg-mystic-panel/85 p-5 shadow-2xl shadow-black/20 backdrop-blur-sm sm:p-8">
        <div class="flex flex-col gap-2 border-b border-mystic-lavender/10 pb-6 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.24em] text-mystic-gold">Tu mapa del día</p>
                <h2 class="mt-2 font-mystic text-3xl font-semibold text-mystic-ivory">Elige tu signo</h2>
            </div>
            <p class="capitalize text-sm text-mystic-ivory/55">{{ $dateLabel }}</p>
        </div>

        <div class="mt-6">
            <flux:radio.group wire:model.live="sign" variant="cards" class="grid! grid-cols-2 gap-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-3">
                @foreach ($this->signs() as $signKey => $signDetails)
                    <flux:radio
                        :key="$signKey"
                        :value="$signKey"
                        class="min-h-20 border-mystic-lavender/15! bg-mystic-ink/35! text-mystic-ivory! data-checked:border-mystic-gold/70! data-checked:bg-mystic-gold/10!"
                    >
                        <flux:radio.indicator />

                        <span class="min-w-0 flex-1">
                            <span class="flex items-center gap-2">
                                <span class="text-xl leading-none text-mystic-gold" aria-hidden="true">{{ $signDetails['symbol'] }}</span>
                                <span class="text-sm font-bold text-mystic-ivory">{{ $signDetails['name'] }}</span>
                            </span>
                            <span class="mt-2 block text-xs font-medium text-mystic-ivory/70">{{ $signDetails['dates'] }}</span>
                        </span>
                    </flux:radio>
                @endforeach
            </flux:radio.group>
            <flux:error name="sign" class="mt-3" />
        </div>

        <div class="mt-7 grid gap-6">
            <flux:radio.group wire:model="focus" label="¿Dónde quieres poner la mirada?" variant="buttons" class="flex-wrap *:min-h-11 *:grow">
                @foreach ($this->focuses() as $focusKey => $focusLabel)
                    <flux:radio :key="$focusKey" :value="$focusKey" :label="$focusLabel" />
                @endforeach
            </flux:radio.group>

            <div class="grid gap-5 sm:grid-cols-2">
                <flux:input wire:model="name" label="Tu nombre" placeholder="Opcional" maxlength="60" />
                <flux:input wire:model="intention" label="Tu intención" placeholder="Ej. claridad para decidir" maxlength="280" />
            </div>
        </div>

        @error('horoscope')
            <div role="alert" class="mt-6 rounded-2xl border border-rose-300/20 bg-rose-200/8 p-4 text-sm leading-6 text-rose-100">
                {{ $message }}
            </div>
        @enderror

        @unless ($aiAvailable)
            <div class="mt-6 rounded-2xl border border-mystic-gold/20 bg-mystic-gold/8 p-4 text-sm leading-6 text-mystic-ivory/70">
                Las lecturas personalizadas están temporalmente en pausa. Vuelve a intentarlo más adelante.
            </div>
        @endunless

        <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:items-center">
            <flux:button type="submit" variant="primary" class="min-h-12 w-full bg-mystic-gold! px-6! font-bold! text-mystic-ink! hover:bg-mystic-gold-soft! sm:w-auto" :disabled="! $aiAvailable">
                <span wire:loading.remove wire:target="generate">Abrir mi horóscopo</span>
                <span wire:loading wire:target="generate">Consultando el cielo…</span>
            </flux:button>
            <p class="text-xs leading-5 text-mystic-ivory/45">Lectura simbólica generada con IA para reflexión y entretenimiento.</p>
        </div>
    </form>

    <aside aria-live="polite" aria-atomic="true" class="xl:sticky xl:top-28">
        <div wire:loading wire:target="generate" class="w-full rounded-[2rem] border border-mystic-gold/20 bg-mystic-panel/85 p-6 sm:p-8">
            <div class="animate-pulse space-y-5">
                <div class="h-3 w-28 rounded-full bg-mystic-gold/25"></div>
                <div class="h-10 w-4/5 rounded-xl bg-mystic-ivory/10"></div>
                <div class="space-y-3">
                    <div class="h-3 rounded-full bg-mystic-ivory/8"></div>
                    <div class="h-3 rounded-full bg-mystic-ivory/8"></div>
                    <div class="h-3 w-3/4 rounded-full bg-mystic-ivory/8"></div>
                </div>
                <p class="pt-4 text-sm text-mystic-ivory/55">Tejiendo símbolos para tu momento…</p>
            </div>
        </div>

        <div wire:loading.remove wire:target="generate">
            @if ($reading)
                <article class="overflow-hidden rounded-[2rem] border border-mystic-gold/25 bg-mystic-panel/95 shadow-2xl shadow-black/25">
                    <div class="border-b border-mystic-gold/15 bg-[radial-gradient(circle_at_top_right,rgba(244,203,141,0.16),transparent_45%)] p-6 sm:p-8">
                        <div class="flex items-center justify-between gap-4">
                            <p class="text-xs font-bold uppercase tracking-[0.24em] text-mystic-gold">Mensaje para {{ $this->signs()[$sign]['name'] }}</p>
                            <span class="text-3xl text-mystic-gold" aria-hidden="true">{{ $this->signs()[$sign]['symbol'] }}</span>
                        </div>
                        <h2 class="mt-5 font-mystic text-4xl leading-none font-semibold text-mystic-ivory">{{ $reading['title'] }}</h2>
                        <p class="mt-5 leading-7 text-mystic-ivory/75">{{ $reading['overview'] }}</p>
                    </div>

                    <div class="grid gap-px bg-mystic-lavender/10 sm:grid-cols-2">
                        @foreach ([
                            ['label' => 'Energía', 'value' => $reading['energy']],
                            ['label' => 'Amor y vínculos', 'value' => $reading['love']],
                            ['label' => 'Trabajo y abundancia', 'value' => $reading['work']],
                            ['label' => 'Tu paso consciente', 'value' => $reading['guidance']],
                        ] as $section)
                            <section wire:key="reading-{{ $section['label'] }}" class="bg-mystic-panel p-5 sm:p-6">
                                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-mystic-lavender">{{ $section['label'] }}</h3>
                                <p class="mt-3 text-sm leading-6 text-mystic-ivory/70">{{ $section['value'] }}</p>
                            </section>
                        @endforeach
                    </div>

                    <div class="space-y-5 p-6 sm:p-8">
                        <blockquote class="border-l-2 border-mystic-gold pl-4 font-mystic text-2xl leading-snug text-mystic-gold">
                            “{{ $reading['affirmation'] }}”
                        </blockquote>
                        <div class="flex flex-wrap gap-2 text-xs font-semibold uppercase tracking-[0.14em] text-mystic-ivory/60">
                            <span class="rounded-full border border-mystic-lavender/15 px-3 py-2">Color · {{ $reading['lucky']['color'] }}</span>
                            <span class="rounded-full border border-mystic-lavender/15 px-3 py-2">Números · {{ implode(' · ', $reading['lucky']['numbers']) }}</span>
                        </div>
                    </div>
                </article>
            @else
                <div class="relative min-h-[30rem] overflow-hidden rounded-[2rem] border border-mystic-lavender/15 bg-mystic-panel/70 p-7 sm:p-10">
                    <div class="absolute -right-20 -top-20 size-64 rounded-full border border-mystic-gold/10"></div>
                    <div class="absolute -right-8 -top-8 size-40 rounded-full border border-mystic-lavender/10"></div>
                    <div class="relative flex min-h-[26rem] flex-col items-center justify-center text-center">
                        <span class="grid size-24 place-items-center rounded-full border border-mystic-gold/30 bg-mystic-gold/8 font-mystic text-5xl text-mystic-gold" aria-hidden="true">☾</span>
                        <p class="mt-7 text-xs font-bold uppercase tracking-[0.25em] text-mystic-lavender">Tu lectura espera</p>
                        <h2 class="mt-3 max-w-sm font-mystic text-4xl leading-tight font-semibold text-mystic-ivory">Una pausa para escuchar lo que ya se mueve en ti</h2>
                        <p class="mt-4 max-w-sm text-sm leading-6 text-mystic-ivory/55">Elige tu signo y un enfoque. La IA creará un mensaje único para acompañar tu día.</p>
                    </div>
                </div>
            @endif
        </div>
    </aside>
</div>
