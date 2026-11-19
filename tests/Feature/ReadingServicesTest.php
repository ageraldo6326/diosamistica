<?php

it('renders each service page with its confirmed information', function (string $slug, string $name, string $price, string $detail) {
    $response = $this->get(route('services.show', $slug));

    $response
        ->assertOk()
        ->assertSeeText($name)
        ->assertSeeText($price)
        ->assertSeeText($detail)
        ->assertSeeText('Reservas en línea próximamente')
        ->assertSeeText('La reserva y el pago en línea estarán disponibles próximamente.');
})->with([
    'general reading' => ['general', 'Lectura general', 'US$87', '20 a 25 minutos para profundizar en tu situación'],
    'emergency reading' => ['emergencia', 'Lectura de emergencia', 'US$120', 'Confirmación según disponibilidad de agenda'],
    'single question reading' => ['una-pregunta', 'Lectura de una sola pregunta', 'US$20', 'Toda la lectura concentrada en una pregunta concreta'],
]);

it('does not promise an unconfirmed response time for the emergency reading', function () {
    $response = $this->get(route('services.show', 'emergencia'));

    $response
        ->assertOk()
        ->assertSeeText('Sujeta a disponibilidad de agenda.')
        ->assertDontSeeText('48 horas');
});

it('returns 404 for an unknown service', function () {
    $response = $this->get('/servicios/servicio-inexistente');

    $response->assertNotFound();
});
