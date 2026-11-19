<?php

return [
    'services' => [
        'general' => [
            'slug' => 'general',
            'name' => 'Lectura general',
            'price_cents' => 8700,
            'currency' => 'USD',
            'eyebrow' => 'Conversación en vivo',
            'hook' => 'Mira el panorama completo, no solo una parte.',
            'summary' => 'Conversa en privado con Diosa Mística durante 20 a 25 minutos por Google Meet. Un espacio para ordenar tus inquietudes y explorar nuevas perspectivas.',
            'cta' => 'Quiero mi lectura general',
            'featured' => true,
            'details' => [
                'Conversación privada con Diosa Mística por Google Meet',
                '20 a 25 minutos para profundizar en tu situación',
                'Espacio para ordenar inquietudes y reconocer nuevas perspectivas',
            ],
        ],
        'una-pregunta' => [
            'slug' => 'una-pregunta',
            'name' => 'Lectura de una sola pregunta',
            'price_cents' => 2000,
            'currency' => 'USD',
            'eyebrow' => 'Claridad en un tema',
            'hook' => 'Cuando una sola duda necesita toda tu atención.',
            'summary' => 'Concentra la lectura en una pregunta concreta y recibe una interpretación simbólica sin desviar el foco hacia otros temas.',
            'cta' => 'Quiero enfocar mi pregunta',
            'details' => [
                'Toda la lectura concentrada en una pregunta concreta',
                'Una interpretación simbólica directa y enfocada',
                'Ideal cuando ya sabes cuál es el tema que quieres explorar',
            ],
        ],
        'emergencia' => [
            'slug' => 'emergencia',
            'name' => 'Lectura de emergencia',
            'price_cents' => 12000,
            'currency' => 'USD',
            'eyebrow' => 'Atención prioritaria',
            'hook' => 'Para una inquietud que no quieres seguir posponiendo.',
            'summary' => 'Solicita una lectura con atención prioritaria para explorar cuanto antes el tema que hoy ocupa tu mente.',
            'status' => 'Sujeta a disponibilidad de agenda.',
            'cta' => 'Elegir atención prioritaria',
            'details' => [
                'Tu solicitud recibe atención prioritaria',
                'Enfocada en el tema que necesitas explorar cuanto antes',
                'Confirmación según disponibilidad de agenda',
            ],
        ],
    ],
];
