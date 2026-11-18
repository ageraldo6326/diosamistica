<?php

return [
    'services' => [
        'general' => [
            'slug' => 'general',
            'name' => 'Lectura general',
            'price_cents' => 8700,
            'currency' => 'USD',
            'eyebrow' => 'Sesión en vivo',
            'hook' => 'Un espacio para explorar lo que te preocupa.',
            'summary' => 'Sesión en vivo de 20 a 25 minutos con Diosa Mística por Google Meet. Conversa sobre el tema que quieres explorar.',
            'cta' => 'Elegir lectura general',
            'featured' => true,
            'details' => [
                'Sesión en vivo con Diosa Mística por Google Meet',
                'Duración de 20 a 25 minutos',
            ],
        ],
        'una-pregunta' => [
            'slug' => 'una-pregunta',
            'name' => 'Lectura de una sola pregunta',
            'price_cents' => 2000,
            'currency' => 'USD',
            'eyebrow' => 'Consulta enfocada',
            'hook' => 'Una pregunta, toda la atención en ese tema.',
            'summary' => 'Una lectura simbólica enfocada en una sola pregunta.',
            'cta' => 'Elegir una pregunta',
            'details' => [
                'Una pregunta concreta',
                'Una lectura enfocada en tu consulta',
            ],
        ],
        'emergencia' => [
            'slug' => 'emergencia',
            'name' => 'Lectura de emergencia',
            'price_cents' => 12000,
            'currency' => 'USD',
            'eyebrow' => 'Atención prioritaria',
            'hook' => 'Atención prioritaria para una consulta de tarot.',
            'summary' => 'Elige esta opción si buscas una lectura prioritaria.',
            'status' => 'Disponibilidad por confirmar.',
            'cta' => 'Elegir lectura prioritaria',
            'details' => [
                'Lectura con atención prioritaria',
                'Disponibilidad por confirmar',
            ],
        ],
    ],
];
