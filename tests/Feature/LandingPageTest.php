<?php

it('renders the conversion journey with services before the tarot sample', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSeeText('Lecturas de tarot para mirar tu situación con una nueva perspectiva')
        ->assertSeeText('Convierte esa inquietud que vuelve una y otra vez en una conversación con sentido. Elige la lectura de Diosa Mística que mejor acompaña lo que necesitas explorar, desde US$20.')
        ->assertSeeTextInOrder([
            'Hay una lectura para cada tipo de inquietud',
            'Tu lectura, directamente con Diosa Mística',
            'Deja que una carta te haga una nueva pregunta',
            'Todo lo que necesitas saber antes de elegir',
            'Tu inquietud merece un espacio para ser mirada',
        ])
        ->assertSeeTextInOrder([
            'Lectura general',
            'Lectura de una sola pregunta',
            'Lectura de emergencia',
        ])
        ->assertSeeText('Quiero mi lectura general')
        ->assertSeeText('Quiero enfocar mi pregunta')
        ->assertSeeText('Elegir atención prioritaria')
        ->assertSeeText('Encontrar mi lectura')
        ->assertSeeText('Reservas en línea próximamente')
        ->assertSeeText('Métodos previstos para las reservas: PayPal y transferencias a Banco BHD, Banco Popular o Banreservas.')
        ->assertDontSeeText('Activa tu consulta simbólica')
        ->assertDontSeeText('Correo electrónico verificable')
        ->assertDontSeeText('resultados garantizados');
});
