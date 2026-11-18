<?php

return [
    'services' => [
        'general' => [
            'slug' => 'general',
            'name' => 'Lectura general',
            'price_cents' => 8700,
            'currency' => 'USD',
            'eyebrow' => 'Encuentro en vivo',
            'summary' => 'Lectura en vivo con Diosa Mística por Google Meet.',
            'details' => [
                'Encuentro individual por Google Meet',
                'Duración de 20–25 minutos',
            ],
        ],
        'emergencia' => [
            'slug' => 'emergencia',
            'name' => 'Lectura de emergencia',
            'price_cents' => 12000,
            'currency' => 'USD',
            'eyebrow' => 'Atención prioritaria',
            'summary' => 'Servicio prioritario para una situación que necesita claridad.',
            'status' => 'Disponibilidad por confirmar',
            'details' => [
                'Lectura con atención prioritaria',
                'Disponibilidad por confirmar',
            ],
        ],
        'una-pregunta' => [
            'slug' => 'una-pregunta',
            'name' => 'Lectura de una sola pregunta',
            'price_cents' => 2000,
            'currency' => 'USD',
            'eyebrow' => 'Consulta enfocada',
            'summary' => 'Lectura enfocada en una sola pregunta.',
            'details' => [
                'Una pregunta concreta',
                'Una lectura enfocada en tu consulta',
            ],
        ],
    ],
];
