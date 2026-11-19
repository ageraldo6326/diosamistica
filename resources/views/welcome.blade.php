<!DOCTYPE html>
<html lang="es" class="scroll-smooth motion-reduce:scroll-auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Lecturas de tarot con Diosa Mística para explorar tus inquietudes con una nueva perspectiva. Elige tu formato desde US$20.">
        <meta name="theme-color" content="#0D1024">

        <title>Diosa Mística · Lecturas de tarot</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|dm-sans:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="landing-page min-h-dvh overflow-x-hidden bg-mystic-ink text-mystic-ivory antialiased" data-public-page>
        <a href="#contenido" class="skip-link">Saltar al contenido</a>

        <div class="cosmic-atmosphere" aria-hidden="true">
            <span class="cosmic-stars cosmic-stars-near"></span>
            <span class="cosmic-stars cosmic-stars-far"></span>
            <span class="cosmic-smoke cosmic-smoke-one"></span>
            <span class="cosmic-smoke cosmic-smoke-two"></span>
        </div>

        <header class="site-header">
            <div class="mystic-container flex min-h-18 items-center justify-between gap-3 py-3">
                <a href="#inicio" class="brand group" aria-label="Diosa Mística, volver al inicio">
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
                    <a href="#servicios" class="nav-link">Lecturas y precios</a>
                    <a href="#conocela" class="nav-link">Diosa Mística</a>
                    <a href="#tirada" class="nav-link">Tirada de muestra</a>
                    <a href="#preguntas" class="nav-link">Preguntas frecuentes</a>
                </nav>

                <div class="flex items-center gap-2">
                    <a href="#servicios" class="header-services-cta button button-primary min-h-11 px-4 sm:px-5" data-focus-target="services-title" data-conversion-cta="header">
                        Encontrar mi lectura
                    </a>

                    <details class="mobile-menu relative lg:hidden">
                        <summary class="icon-button" aria-label="Abrir menú">
                            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path d="M5 7h14M5 12h14M5 17h14" stroke-linecap="round" />
                            </svg>
                        </summary>
                        <nav class="mobile-menu-panel" aria-label="Navegación móvil">
                            <a href="#servicios">Lecturas y precios</a>
                            <a href="#conocela">Diosa Mística</a>
                            <a href="#tirada">Tirada de muestra</a>
                            <a href="#preguntas">Preguntas frecuentes</a>
                        </nav>
                    </details>
                </div>
            </div>
        </header>

        <main id="contenido">
            <section id="inicio" class="hero-section scroll-mt-24" aria-labelledby="hero-title" data-conversion-hero>
                <div class="mystic-container grid items-center gap-8 py-10 sm:py-16 lg:min-h-[720px] lg:grid-cols-[1.08fr_0.92fr] lg:gap-16 lg:py-20">
                    <div class="hero-copy relative z-10 max-w-2xl">
                        <p class="eyebrow">
                            <span aria-hidden="true">✦</span>
                            Un espacio para mirar hacia dentro
                        </p>
                        <h1 id="hero-title" class="mt-5 font-mystic text-[clamp(3rem,11vw,5.8rem)] leading-[0.9] font-medium tracking-[-0.035em] text-mystic-ivory">
                            Lecturas de tarot para mirar tu situación <em class="block font-medium text-mystic-gold">con una nueva perspectiva</em>
                        </h1>
                        <p class="mt-6 max-w-xl text-base leading-7 text-mystic-ivory/72 sm:text-lg">
                            Convierte esa inquietud que vuelve una y otra vez en una conversación con sentido. Elige la lectura de Diosa Mística que mejor acompaña lo que necesitas explorar, desde US$20.
                        </p>

                        <div class="mt-8 flex flex-col items-stretch gap-3 sm:flex-row sm:items-center">
                            <a href="#servicios" class="button button-gold conversion-primary w-full sm:w-auto" data-focus-target="services-title" data-conversion-cta="hero">
                                Encontrar mi lectura
                                <span class="conversion-arrow" aria-hidden="true">→</span>
                            </a>
                            <a href="#tirada" class="button button-secondary w-full sm:w-auto" data-focus-target="tirada-title">
                                Probar una carta
                            </a>
                        </div>
                    </div>

                    <div class="hero-deck" aria-label="Carta de oráculo con mensajes que cambian según distintos temas">
                        <div class="deck-halo" aria-hidden="true"></div>
                        <div class="deck-card deck-card-main" aria-hidden="true" data-hero-oracle-card>
                            <svg class="deck-card-border-glow" viewBox="0 0 100 159" preserveAspectRatio="none" aria-hidden="true">
                                <rect x="1" y="1" width="98" height="157" rx="8" pathLength="100" />
                            </svg>
                            <div class="flex w-full items-center justify-between text-mystic-gold">
                                <span>✦</span><span class="text-[0.58rem] font-bold uppercase tracking-[0.28em]">Oráculo eterno</span><span>✦</span>
                            </div>
                            <div class="card-orbit">
                                <span class="orbit-star">☆</span>
                                <svg viewBox="0 0 24 24" class="size-16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" data-hero-oracle-icon>
                                    <defs>
                                        <symbol id="oracle-heart" viewBox="0 0 24 24">
                                            <path d="M20.8 4.6a5.4 5.4 0 0 0-7.6 0L12 5.8l-1.2-1.2a5.4 5.4 0 0 0-7.6 7.6l1.2 1.2L12 21l7.6-7.6 1.2-1.2a5.4 5.4 0 0 0 0-7.6Z" stroke-linecap="round" stroke-linejoin="round" />
                                        </symbol>
                                        <symbol id="oracle-business" viewBox="0 0 24 24">
                                            <path d="M9 6V4h6v2M4 9h16v10H4V9Zm0 4c5.2 2 10.8 2 16 0M10 13h4" stroke-linecap="round" stroke-linejoin="round" />
                                        </symbol>
                                        <symbol id="oracle-travel" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="9" />
                                            <path d="m15.8 8.2-2.2 5.4-5.4 2.2 2.2-5.4 5.4-2.2Z" stroke-linecap="round" stroke-linejoin="round" />
                                        </symbol>
                                        <symbol id="oracle-money" viewBox="0 0 24 24">
                                            <ellipse cx="12" cy="7" rx="7" ry="3" />
                                            <path d="M5 7v5c0 1.7 3.1 3 7 3s7-1.3 7-3V7M5 12v5c0 1.7 3.1 3 7 3s7-1.3 7-3v-5" stroke-linecap="round" />
                                        </symbol>
                                        <symbol id="oracle-purpose" viewBox="0 0 24 24">
                                            <path d="m12 3 1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3Z" stroke-linejoin="round" />
                                            <path d="m18.5 16 .7 1.8 1.8.7-1.8.7-.7 1.8-.7-1.8-1.8-.7 1.8-.7.7-1.8Z" stroke-linejoin="round" />
                                        </symbol>
                                    </defs>
                                    <use href="#oracle-purpose" data-hero-oracle-icon-use />
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="font-mystic text-2xl leading-none text-mystic-ivory" data-hero-oracle-title>Tu verdadera dirección</p>
                                <p class="mt-3 text-[0.58rem] font-semibold uppercase tracking-[0.28em] text-mystic-lavender" data-hero-oracle-topic>Propósito & crecimiento</p>
                            </div>
                            <div class="flex w-full items-center justify-between text-xs text-mystic-gold"><span>☾</span><span data-hero-oracle-number>XVII</span><span>☼</span></div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="servicios" class="services-section scroll-mt-20 bg-mystic-ink/90 py-20 sm:py-28" aria-labelledby="services-title" data-sticky-cta-hide>
                <div class="mystic-container">
                    <div class="section-heading">
                        <p class="eyebrow justify-center">Elige según lo que necesitas</p>
                        <h2 id="services-title" tabindex="-1">Hay una lectura para cada tipo de inquietud</h2>
                        <p>Profundiza en el panorama completo, enfoca una sola pregunta o solicita atención prioritaria. Tú eliges por dónde comenzar.</p>
                    </div>

                    <div class="service-grid mt-12 grid items-stretch gap-5 lg:grid-cols-3">
                        @foreach ($readingServices as $readingService)
                            @php($price = 'US$'.number_format($readingService['price_cents'] / 100, 0))

                            <article class="service-card {{ ($readingService['featured'] ?? false) ? 'service-card-featured' : '' }}" data-service-card>
                                @if ($readingService['featured'] ?? false)
                                    <span class="service-featured-badge">Sesión en vivo</span>
                                @endif

                                <p class="service-label">{{ $readingService['eyebrow'] }}</p>
                                <h3>{{ $readingService['name'] }}</h3>
                                <p class="service-hook">{{ $readingService['hook'] }}</p>
                                <p class="service-price">{{ $price }}</p>
                                <p class="service-description">{{ $readingService['summary'] }}</p>

                                @isset($readingService['status'])
                                    <p class="service-status">{{ $readingService['status'] }}</p>
                                @endisset

                                <div class="mt-auto grid gap-3 pt-7">
                                    <a href="{{ route('services.show', $readingService['slug']) }}" class="service-detail-link">
                                        Descubrir esta lectura
                                        <span aria-hidden="true">↗</span>
                                    </a>
                                    <button
                                        type="button"
                                        class="button {{ ($readingService['featured'] ?? false) ? 'button-gold' : 'button-secondary' }} w-full"
                                        data-select-service
                                        data-service-name="{{ $readingService['name'] }}"
                                        data-service-price="{{ $price }}"
                                        data-service-choice="{{ $readingService['slug'] }}"
                                        aria-pressed="false"
                                    >
                                        {{ $readingService['cta'] }}
                                    </button>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <aside class="service-selection" aria-labelledby="selected-service-title" data-service-selection>
                        <div>
                            <p class="service-label">Tu elección</p>
                            <h3 id="selected-service-title" data-selected-service-name>¿Cuál lectura conecta contigo?</h3>
                            <p data-selected-service-message>Compara cada opción y marca la que mejor responde al momento que estás viviendo.</p>
                        </div>
                        <div class="service-selection-price" data-selected-service-details hidden>
                            <strong data-selected-service-price></strong>
                            <span>Reservas en línea próximamente</span>
                        </div>
                        <p class="sr-only" data-service-announcement aria-live="polite" aria-atomic="true"></p>
                    </aside>
                </div>
            </section>

            <section id="conocela" class="section-shell scroll-mt-20 py-20 sm:py-28" aria-labelledby="about-title">
                <div class="mystic-container">
                    <div class="about-reader-panel">
                        <div class="about-reader-symbol" aria-hidden="true">
                            <span>✦</span>
                            <span class="about-reader-moon">☾</span>
                            <span>✦</span>
                        </div>
                        <div>
                            <p class="eyebrow">Una conversación, no una respuesta genérica</p>
                            <h2 id="about-title" class="mt-4 font-mystic text-[clamp(2.7rem,8vw,4.8rem)] leading-[0.94] font-medium text-mystic-ivory">Tu lectura, directamente con Diosa Mística</h2>
                            <p class="mt-6 max-w-2xl text-base leading-8 text-mystic-ivory/70 sm:text-lg">En la lectura general tienes un espacio privado, uno a uno, para conversar sobre lo que hoy te inquieta y mirarlo desde nuevas perspectivas.</p>
                            <div class="mt-7 flex flex-wrap gap-3 text-sm text-mystic-lavender">
                                <span class="reader-fact">20 a 25 minutos</span>
                                <span class="reader-fact">Conversación uno a uno</span>
                                <span class="reader-fact">Google Meet</span>
                            </div>
                            <a href="{{ route('services.show', 'general') }}" class="button button-secondary mt-8">Descubrir la sesión en vivo</a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="tirada" class="scroll-mt-20 bg-mystic-ink/90" aria-labelledby="tirada-title">
                <div class="mystic-container py-20 sm:py-28">
                    <div class="section-heading max-w-3xl">
                        <p class="eyebrow justify-center">Prueba la experiencia</p>
                        <h2 id="tirada-title" tabindex="-1">Deja que una carta te haga una nueva pregunta</h2>
                        <p>Elige una carta y descubre una invitación simbólica para mirar tu momento desde otro ángulo.</p>
                    </div>

                    <p id="card-announcement" class="sr-only" aria-live="polite" aria-atomic="true"></p>

                    <div class="mt-12 grid gap-8 md:grid-cols-3 md:gap-5 lg:gap-8" data-tarot-reading>
                        <article class="tarot-reading-card" data-tarot-card data-card-name="Raíz viajera">
                            <button type="button" class="tarot-card-button" aria-expanded="false" aria-describedby="past-reading" data-reveal-card>
                                <span class="tarot-card-inner">
                                    <span class="tarot-face tarot-back">
                                        <span class="tarot-meta"><span>✦</span><span>I · Pasado</span><span>✦</span></span>
                                        <span class="tarot-emblem">◉</span>
                                        <span class="tarot-prompt">Toca para descubrir</span>
                                        <span class="tarot-brand">Diosa Mística</span>
                                    </span>
                                    <span class="tarot-face tarot-front">
                                        <span class="tarot-meta"><span>✦</span><span>I · Pasado</span><span>✦</span></span>
                                        <span class="tarot-emblem">☾</span>
                                        <strong>Raíz viajera</strong>
                                        <span class="tarot-keyword">Origen · memoria · impulso</span>
                                        <span class="tarot-brand">Arquetipo revelado</span>
                                    </span>
                                </span>
                            </button>
                            <div id="past-reading" class="tarot-interpretation" data-card-interpretation hidden>
                                <p>Tu historia no es un ancla: es la raíz que te permite avanzar con mayor conciencia.</p>
                                <strong>¿Qué aprendizaje del pasado quiere acompañarte, no detenerte?</strong>
                            </div>
                        </article>

                        <article class="tarot-reading-card" data-tarot-card data-card-name="El eje presente">
                            <button type="button" class="tarot-card-button" aria-expanded="false" aria-describedby="present-reading" data-reveal-card>
                                <span class="tarot-card-inner">
                                    <span class="tarot-face tarot-back">
                                        <span class="tarot-meta"><span>✦</span><span>II · Presente</span><span>✦</span></span>
                                        <span class="tarot-emblem">⚖</span>
                                        <span class="tarot-prompt">Toca para descubrir</span>
                                        <span class="tarot-brand">Diosa Mística</span>
                                    </span>
                                    <span class="tarot-face tarot-front">
                                        <span class="tarot-meta"><span>✦</span><span>II · Presente</span><span>✦</span></span>
                                        <span class="tarot-emblem">✧</span>
                                        <strong>El eje presente</strong>
                                        <span class="tarot-keyword">Balance · elección · verdad</span>
                                        <span class="tarot-brand">Arquetipo revelado</span>
                                    </span>
                                </span>
                            </button>
                            <div id="present-reading" class="tarot-interpretation" data-card-interpretation hidden>
                                <p>La claridad aparece cuando dejas de exigirte todas las respuestas al mismo tiempo.</p>
                                <strong>¿Qué decisión se vuelve más sencilla si escuchas lo que ya sabes?</strong>
                            </div>
                        </article>

                        <article class="tarot-reading-card" data-tarot-card data-card-name="Horizonte solar">
                            <button type="button" class="tarot-card-button" aria-expanded="false" aria-describedby="horizon-reading" data-reveal-card>
                                <span class="tarot-card-inner">
                                    <span class="tarot-face tarot-back">
                                        <span class="tarot-meta"><span>✦</span><span>III · Horizonte</span><span>✦</span></span>
                                        <span class="tarot-emblem">☼</span>
                                        <span class="tarot-prompt">Toca para descubrir</span>
                                        <span class="tarot-brand">Diosa Mística</span>
                                    </span>
                                    <span class="tarot-face tarot-front">
                                        <span class="tarot-meta"><span>✦</span><span>III · Horizonte</span><span>✦</span></span>
                                        <span class="tarot-emblem">☼</span>
                                        <strong>Horizonte solar</strong>
                                        <span class="tarot-keyword">Expansión · confianza · visión</span>
                                        <span class="tarot-brand">Arquetipo revelado</span>
                                    </span>
                                </span>
                            </button>
                            <div id="horizon-reading" class="tarot-interpretation" data-card-interpretation hidden>
                                <p>Tu próximo horizonte pide presencia y una acción pequeña, sostenida y honesta.</p>
                                <strong>¿Qué paso posible puede acercarte hoy a la vida que imaginas?</strong>
                            </div>
                        </article>
                    </div>

                    <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                        <button type="button" class="button button-secondary" data-reset-reading disabled>Reiniciar tirada</button>
                        <a href="#servicios" class="button button-gold" data-reading-cta data-focus-target="services-title" data-conversion-cta="reading" hidden>
                            Quiero una lectura para mí
                        </a>
                    </div>
                </div>
            </section>

            <section id="preguntas" class="section-shell scroll-mt-20 py-20 sm:py-28" aria-labelledby="faq-title">
                <div class="mystic-container">
                    <div class="section-heading">
                        <p class="eyebrow justify-center">Resuelve tus dudas</p>
                        <h2 id="faq-title">Todo lo que necesitas saber antes de elegir</h2>
                        <p>Compara con confianza y elige la experiencia que mejor se ajusta a tu momento.</p>
                    </div>

                    <div class="faq-list mx-auto mt-12 grid max-w-3xl gap-3">
                        <details class="faq-item">
                            <summary>¿Cómo sé cuál lectura elegir?</summary>
                            <p>Elige la lectura general si quieres explorar el panorama completo, una sola pregunta si ya tienes un tema concreto o la opción de emergencia si necesitas atención prioritaria.</p>
                        </details>
                        <details class="faq-item">
                            <summary>¿Quién realiza mi lectura?</summary>
                            <p>La lectura general la realiza Diosa Mística en una conversación directa por Google Meet.</p>
                        </details>
                        <details class="faq-item">
                            <summary>¿Qué puedo explorar en la lectura general?</summary>
                            <p>Puedes llevar el tema que hoy ocupa tu mente y conversarlo durante una sesión en vivo de 20 a 25 minutos.</p>
                        </details>
                        <details class="faq-item">
                            <summary>¿Cómo podré pagar?</summary>
                            <p>Métodos previstos para las reservas: PayPal y transferencias a Banco BHD, Banco Popular o Banreservas. Todavía no hay enlaces de cobro activos.</p>
                        </details>
                        <details class="faq-item">
                            <summary>¿Ya puedo reservar?</summary>
                            <p>Reservas en línea próximamente. Por ahora puedes comparar las opciones y dejar seleccionada la lectura que te interesa.</p>
                        </details>
                    </div>

                    <div class="closing-cta" data-sticky-cta-hide data-closing-cta>
                        <span class="closing-sigil" aria-hidden="true">☾</span>
                        <h2>Tu inquietud merece un espacio para ser mirada</h2>
                        <a href="#servicios" class="button button-gold conversion-primary" data-focus-target="services-title" data-conversion-cta="closing">
                            Elegir mi lectura
                            <span class="conversion-arrow" aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer" data-sticky-cta-hide>
            <div class="mystic-container py-12">
                <div class="flex flex-col gap-8 border-b border-mystic-lavender/10 pb-9 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <a href="#inicio" class="brand w-fit" aria-label="Diosa Mística, volver al inicio">
                            <span class="brand-mark" aria-hidden="true">☾</span>
                            <span class="font-mystic text-xl font-semibold tracking-[0.18em]">DIOSA MÍSTICA</span>
                        </a>
                        <p class="mt-5 max-w-md text-sm leading-6 text-mystic-ivory/55">Un espacio de introspección para explorar lo que estás viviendo a través de símbolos y arquetipos. No sustituye orientación médica, psicológica, legal o financiera.</p>
                    </div>
                    <nav class="footer-links" aria-label="Explorar">
                        <a href="#servicios">Lecturas y precios</a>
                        <a href="#conocela">Diosa Mística</a>
                        <a href="#tirada">Tirada de muestra</a>
                        <a href="#preguntas">Preguntas frecuentes</a>
                    </nav>
                </div>
                <div class="flex flex-col gap-3 pt-7 text-xs text-mystic-ivory/42 sm:flex-row sm:items-center sm:justify-between">
                    <p>© {{ date('Y') }} Diosa Mística. Todos los derechos reservados.</p>
                    <p>Lectura simbólica · Sin transacciones activas</p>
                </div>
            </div>
        </footer>

        <div class="mobile-conversion-bar" data-mobile-conversion-bar hidden>
            <a href="#servicios" class="button button-gold w-full" data-focus-target="services-title" data-conversion-cta="mobile-sticky">
                Encontrar mi lectura
                <span aria-hidden="true">→</span>
            </a>
        </div>
    </body>
</html>
