<!DOCTYPE html>
<html lang="es" class="scroll-smooth motion-reduce:scroll-auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Descubre tu horóscopo diario personalizado con IA en Diosa Mística. Una lectura simbólica para acompañar tu reflexión.">
        <meta name="theme-color" content="#0D1024">

        <title>Horóscopo diario con IA · Diosa Mística</title>

        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|dm-sans:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance
    </head>
    <body class="landing-page min-h-dvh overflow-x-hidden bg-mystic-ink text-mystic-ivory antialiased" data-public-page>
        <a href="#contenido" class="skip-link">Saltar al contenido</a>

        <div class="cosmic-atmosphere" aria-hidden="true">
            <span class="cosmic-stars cosmic-stars-near"></span>
            <span class="cosmic-stars cosmic-stars-far"></span>
            <span class="cosmic-smoke cosmic-smoke-one"></span>
            <span class="cosmic-smoke cosmic-smoke-two"></span>
            <span class="cosmic-smoke cosmic-smoke-three"></span>
        </div>

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
                    <a href="{{ route('home') }}#servicios" class="nav-link">Lecturas y precios</a>
                    <a href="{{ route('horoscope') }}" class="nav-link text-mystic-gold!" aria-current="page">Horóscopo IA</a>
                    <a href="{{ route('home') }}#conocela" class="nav-link">Diosa Mística</a>
                </nav>

                <a href="{{ route('home') }}#servicios" class="button button-primary min-h-11 px-4 sm:px-5">
                    <span class="sm:hidden">Lecturas</span>
                    <span class="hidden sm:inline">Explorar lecturas</span>
                </a>
            </div>
        </header>

        <main id="contenido" class="relative">
            <section class="mystic-container py-12 sm:py-18 lg:py-22" aria-labelledby="horoscope-title">
                <div class="mx-auto mb-10 max-w-3xl text-center sm:mb-14">
                    <p class="eyebrow justify-center"><span aria-hidden="true">✦</span> Un mensaje distinto cada día</p>
                    <h1 id="horoscope-title" class="mt-5 font-mystic text-[clamp(3.2rem,10vw,6.2rem)] leading-[0.9] font-medium tracking-[-0.035em] text-mystic-ivory">
                        Tu horóscopo, creado <em class="font-medium text-mystic-gold">para este momento</em>
                    </h1>
                    <p class="mx-auto mt-6 max-w-2xl text-base leading-7 text-mystic-ivory/68 sm:text-lg">
                        Elige tu signo y aquello que hoy ocupa tu atención. La inteligencia artificial de Diosa Mística convertirá ese contexto en una guía simbólica, íntima y práctica.
                    </p>
                </div>

                <livewire:horoscope-generator />
            </section>
        </main>

        <footer class="site-footer">
            <div class="mystic-container flex flex-col gap-5 py-10 text-sm text-mystic-ivory/55 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('home') }}" class="brand w-fit" aria-label="Diosa Mística, volver al inicio">
                    <span class="brand-mark" aria-hidden="true">☾</span>
                    <span class="font-mystic text-xl font-semibold tracking-[0.18em] text-mystic-ivory">DIOSA MÍSTICA</span>
                </a>
                <p>© {{ date('Y') }} Diosa Mística · Lectura simbólica para reflexión y entretenimiento</p>
            </div>
        </footer>

        @fluxScripts
    </body>
</html>
