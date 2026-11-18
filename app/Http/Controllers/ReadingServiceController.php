<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ReadingServiceController extends Controller
{
    public function show(string $service): View
    {
        $readingService = config("lecturas.services.{$service}");

        abort_unless(is_array($readingService), 404);

        return view('services.show', [
            'readingService' => $readingService,
            'readingServices' => config('lecturas.services'),
        ]);
    }
}
