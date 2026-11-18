<!DOCTYPE html>
<html lang="es" class="scroll-smooth motion-reduce:scroll-auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $readingService['name'] }} de Diosa Mística por US${{ number_format($readingService['price_cents'] / 100, 0) }}.">
        <meta name="theme-color" content="#0D1024">

        <title>{{ $readingService['name'] }} · Diosa Mística</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|dm-sans:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="landing-page min-h-dvh overflow-x-hidden bg-mystic-ink text-mystic-ivory antialiased" data-public-page>
        <a href="#contenido" class="skip-link">Saltar al contenido</a>

        <header class="site-header">
            <div class="mystic-container flex min-h-18 items-center justify-between gap-3 py-3">
                <a href="{{ route('home') }}" class="brand group" aria-label="Diosa Mística, volver al inicio">
                    <span class="brand-mark" aria-hidden="true">
                        <svg viewBox="0 0 44 44" class="size-full" fill="none">
                            <path d="M29.8 7.7a15.4 15.4 0 1 0 6.5 22.8A13.2 13.2 0 1 1 29.8 7.7Z" stroke="currentColor" stroke-width="1.6" />
                            <path d="m32.2 8.1.7 2.2 2.2.7-2.2.7-.7 2.2-.7-2.2-2.2-.7 2.2-.7.7-2.2Z" fill="currentColor" />
                            <circle cx="10" cy="13" r="1" fill="currentColor" />
                        </svg>
                    </span>
                    <span class="grid leading-none">
                        <span class="font-mystic text-[1.05rem] font-semibold tracking-[0.22em] text-mystic-ivory">DIOSA MÍSTICA</span>
                        <span class="mt-1 text-[0.56rem] font-semibold uppercase tracking-[0.3em] text-mystic-gold/80">Oráculo simbólico</span>
                    </span>
                </a>

                <nav class="hidden items-center gap-1 lg:flex" aria-label="Navegación principal">
                    <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                    <a href="{{ route('home') }}#servicios" class="nav-link">Servicios y precios</a>
                    <a href="{{ route('home') }}#tirada" class="nav-link">Tirada de muestra</a>
                    <a href="{{ route('home') }}#conocela" class="nav-link">Diosa Mística</a>
                    <a href="{{ route('home') }}#preguntas" class="nav-link">Preguntas frecuentes</a>
                </nav>

                <div class="flex items-center gap-2">
                    <a href="{{ route('home') }}#servicios" class="header-services-cta button button-primary min-h-11 px-4 sm:px-5">
                        <span class="sm:hidden">Servicios</span>
                        <span class="hidden sm:inline">Ver servicios</span>
                    </a>

                    <details class="mobile-menu relative lg:hidden">
                        <summary class="icon-button" aria-label="Abrir menú">
                            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path d="M5 7h14M5 12h14M5 17h14" stroke-linecap="round" />
                            </svg>
                        </summary>
                        <nav class="mobile-menu-panel" aria-label="Navegación móvil">
                            <a href="{{ route('home') }}">Inicio</a>
                            <a href="{{ route('home') }}#servicios">Servicios y precios</a>
                            <a href="{{ route('home') }}#tirada">Tirada de muestra</a>
                            <a href="{{ route('home') }}#conocela">Diosa Mística</a>
                            <a href="{{ route('home') }}#preguntas">Preguntas frecuentes</a>
                        </nav>
                    </details>
                </div>
            </div>
        </header>

        <main id="contenido">
            <section class="service-detail-hero" aria-labelledby="service-title">
                <div class="mystic-container grid items-center gap-10 py-16 sm:py-24 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16 lg:py-28">
                    <div class="relative z-10 max-w-2xl">
                        <a href="{{ route('home') }}#servicios" class="service-back-link">
                            <span aria-hidden="true">←</span>
                            Todos los servicios
                        </a>
                        <p class="eyebrow mt-8">
                            <span aria-hidden="true">✦</span>
                            {{ $readingService['eyebrow'] }}
                        </p>
                        <h1 id="service-title" class="mt-5 font-mystic text-[clamp(3.2rem,11vw,5.8rem)] leading-[0.9] font-medium tracking-[-0.035em] text-mystic-ivory">
                            {{ $readingService['name'] }}
                        </h1>
                        <p class="mt-6 max-w-xl text-base leading-8 text-mystic-ivory/72 sm:text-lg">{{ $readingService['summary'] }}</p>

                        @isset($readingService['status'])
                            <p class="service-status mt-6 w-fit">{{ $readingService['status'] }}</p>
                        @endisset

                        <div class="mt-9 flex flex-col items-start gap-4 sm:flex-row sm:items-center">
                            <a href="{{ route('home') }}#servicios" class="button button-gold w-full sm:w-auto">Elegir en el catálogo</a>
                            <p class="text-sm font-semibold text-mystic-lavender">Reservas en línea próximamente</p>
                        </div>
                    </div>

                    <aside class="service-detail-card" aria-label="Detalles de {{ $readingService['name'] }}">
                        <div class="service-detail-symbol" aria-hidden="true">
                            <span>✦</span>
                            <span>☾</span>
                            <span>✦</span>
                        </div>
                        <p class="service-label">Precio</p>
                        <p class="service-detail-price">US${{ number_format($readingService['price_cents'] / 100, 0) }}</p>
                        <ul class="service-detail-list">
                            @foreach ($readingService['details'] as $detail)
                                <li><span aria-hidden="true">✦</span> {{ $detail }}</li>
                            @endforeach
                        </ul>
                        <p class="service-detail-note">Este sitio presenta la información del servicio. No procesa pagos ni reservas.</p>
                    </aside>
                </div>
            </section>

            <section class="section-shell py-20 sm:py-24" aria-labelledby="other-services-title">
                <div class="mystic-container">
                    <div class="section-heading">
                        <p class="eyebrow justify-center">Explora tus opciones</p>
                        <h2 id="other-services-title">Otros servicios</h2>
                        <p>Puedes comparar las tres lecturas antes de elegir.</p>
                    </div>

                    <div class="mt-12 grid gap-5 md:grid-cols-2">
                        @foreach ($readingServices as $service)
                            @continue($service['slug'] === $readingService['slug'])

                            <a href="{{ route('services.show', $service['slug']) }}" class="service-related-card">
                                <span>
                                    <small>{{ $service['eyebrow'] }}</small>
                                    <strong>{{ $service['name'] }}</strong>
                                </span>
                                <span>
                                    <b>US${{ number_format($service['price_cents'] / 100, 0) }}</b>
                                    <span aria-hidden="true">↗</span>
                                </span>
                            </a>
                        @endforeach
                    </div>

                    <p class="payment-note">Métodos previstos para las reservas: PayPal y transferencias a Banco BHD, Banco Popular o Banreservas</p>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="mystic-container flex flex-col gap-5 py-10 text-sm text-mystic-ivory/55 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('home') }}" class="brand w-fit" aria-label="Diosa Mística, volver al inicio">
                    <span class="brand-mark" aria-hidden="true">☾</span>
                    <span class="font-mystic text-xl font-semibold tracking-[0.18em] text-mystic-ivory">DIOSA MÍSTICA</span>
                </a>
                <p>© {{ date('Y') }} Diosa Mística · Lectura simbólica · Sin transacciones</p>
            </div>
        </footer>
    </body>
</html>
