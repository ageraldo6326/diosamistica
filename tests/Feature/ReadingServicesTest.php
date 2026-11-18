<?php

it('renders each service page with its confirmed information', function (string $slug, string $name, string $price, string $detail) {
    $response = $this->get(route('services.show', $slug));

    $response
        ->assertOk()
        ->assertSeeText($name)
        ->assertSeeText($price)
        ->assertSeeText($detail)
        ->assertSeeText('Reservas en línea próximamente')
        ->assertSeeText('Este sitio presenta la información del servicio. No procesa pagos ni reservas.');
})->with([
    'general reading' => ['general', 'Lectura general', 'US$87', 'Duración de 20–25 minutos'],
    'emergency reading' => ['emergencia', 'Lectura de emergencia', 'US$120', 'Disponibilidad por confirmar'],
    'single question reading' => ['una-pregunta', 'Lectura de una sola pregunta', 'US$20', 'Una pregunta concreta'],
]);

it('does not promise an unconfirmed response time for the emergency reading', function () {
    $response = $this->get(route('services.show', 'emergencia'));

    $response
        ->assertOk()
        ->assertSeeText('Disponibilidad por confirmar')
        ->assertDontSeeText('48 horas');
});

it('returns 404 for an unknown service', function () {
    $response = $this->get('/servicios/servicio-inexistente');

    $response->assertNotFound();
});
