<?php

it('renders the public landing page with the service catalog', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSeeText('Elige una carta del Cosmos')
        ->assertSeeText('¿Cómo funciona la lectura?')
        ->assertSeeText('Esta demostración no crea una cuenta, un PIN ni una lectura real.')
        ->assertSeeText('Tirada de muestra')
        ->assertSeeText('Lectura general')
        ->assertSeeText('US$87')
        ->assertSeeText('Lectura de emergencia')
        ->assertSeeText('US$120')
        ->assertSeeText('Disponibilidad por confirmar')
        ->assertSeeText('Lectura de una sola pregunta')
        ->assertSeeText('US$20')
        ->assertSeeText('Reservas en línea próximamente')
        ->assertDontSeeText('Precio por definir')
        ->assertDontSeeText('Horarios por publicar');
});
