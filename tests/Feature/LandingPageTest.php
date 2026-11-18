<?php

it('renders the public landing page with its prototype experiences', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSeeText('Elige una carta del Cosmos')
        ->assertSeeText('¿Cómo funciona la lectura?')
        ->assertSeeText('Esta demostración no crea una cuenta, un PIN ni una lectura real.')
        ->assertSeeText('Tirada de muestra')
        ->assertSeeText('Precio por definir')
        ->assertSeeText('Horarios por publicar');
});
