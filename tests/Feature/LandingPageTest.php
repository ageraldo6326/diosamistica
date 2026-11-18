<?php

it('renders the conversion journey with services before the tarot sample', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSeeText('Lecturas de tarot con Diosa Mística')
        ->assertSeeText('Explora lo que te inquieta con una lectura simbólica. Elige el formato que más te sirva, desde US$20.')
        ->assertSeeTextInOrder([
            'Elige tu lectura',
            'Conoce a Diosa Mística',
            'Elige una carta del cosmos',
            'Preguntas frecuentes',
            'Encuentra la lectura que mejor se ajusta a lo que buscas',
        ])
        ->assertSeeTextInOrder([
            'Lectura general',
            'Lectura de una sola pregunta',
            'Lectura de emergencia',
        ])
        ->assertSeeText('Elegir lectura general')
        ->assertSeeText('Elegir una pregunta')
        ->assertSeeText('Elegir lectura prioritaria')
        ->assertSeeText('Reservas en línea próximamente')
        ->assertSeeText('Métodos previstos para las reservas: PayPal y transferencias a Banco BHD, Banco Popular o Banreservas.')
        ->assertDontSeeText('Activa tu consulta simbólica')
        ->assertDontSeeText('Correo electrónico verificable');
});
