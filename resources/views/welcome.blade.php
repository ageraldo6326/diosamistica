<!DOCTYPE html>
<html lang="es" class="scroll-smooth motion-reduce:scroll-auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Diosa Mística: una experiencia de lectura simbólica para conectar con tu intuición.">
        <meta name="theme-color" content="#0D1024">

        <title>Diosa Mística · Lecturas simbólicas</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|dm-sans:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="landing-page min-h-dvh overflow-x-hidden bg-mystic-ink text-mystic-ivory antialiased" data-landing>
        <a href="#contenido" class="skip-link">Saltar al contenido</a>

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
                    <a href="#como-funciona" class="nav-link">Cómo funciona</a>
                    <a href="#tirada" class="nav-link">Tirada de muestra</a>
                    <a href="#paquetes" class="nav-link">Paquetes</a>
                    <a href="#sesion" class="nav-link">Sesión en vivo</a>
                </nav>

                <div class="flex items-center gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}" class="hidden px-3 py-2 text-sm font-semibold text-mystic-lavender transition hover:text-mystic-ivory focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-mystic-gold sm:inline-flex">
                            Mi espacio
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="hidden px-3 py-2 text-sm font-semibold text-mystic-lavender transition hover:text-mystic-ivory focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-mystic-gold sm:inline-flex">
                            Acceder
                        </a>
                    @endauth

                    <a href="#lectura" class="button button-primary min-h-11 px-4 sm:px-5" data-focus-target="lectura-title">
                        <span class="sm:hidden">Leer</span>
                        <span class="hidden sm:inline">Iniciar lectura</span>
                    </a>

                    <details class="mobile-menu relative lg:hidden">
                        <summary class="icon-button" aria-label="Abrir menú">
                            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path d="M5 7h14M5 12h14M5 17h14" stroke-linecap="round" />
                            </svg>
                        </summary>
                        <nav class="mobile-menu-panel" aria-label="Navegación móvil">
                            <a href="#como-funciona">Cómo funciona</a>
                            <a href="#tirada">Tirada de muestra</a>
                            <a href="#paquetes">Paquetes</a>
                            <a href="#sesion">Sesión en vivo</a>
                            @auth
                                <a href="{{ route('dashboard') }}">Mi espacio</a>
                            @else
                                <a href="{{ route('login') }}">Acceder</a>
                            @endauth
                        </nav>
                    </details>
                </div>
            </div>
        </header>

        <main id="contenido">
            <section id="inicio" class="hero-section scroll-mt-24" aria-labelledby="hero-title">
                <div class="mystic-container grid items-center gap-10 py-12 sm:py-16 lg:min-h-[760px] lg:grid-cols-[1.05fr_0.95fr] lg:gap-16 lg:py-24">
                    <div class="hero-copy relative z-10 max-w-2xl">
                        <p class="eyebrow">
                            <span aria-hidden="true">✦</span>
                            Diosa Mística Sanctum
                        </p>
                        <h1 id="hero-title" class="mt-5 font-mystic text-[clamp(3.1rem,12vw,5.6rem)] leading-[0.88] font-medium tracking-[-0.035em] text-mystic-ivory">
                            Elige una carta del <em class="block font-medium text-mystic-gold">Cosmos</em>
                        </h1>
                        <p class="mt-6 max-w-xl text-base leading-7 text-mystic-ivory/72 sm:text-lg">
                            Abre una lectura simbólica guiada por arquetipos. Un momento íntimo para escuchar tu intuición y mirar tu presente desde otra perspectiva.
                        </p>

                        <div class="mt-8 flex flex-col items-start gap-3 sm:flex-row sm:items-center">
                            <a href="#lectura" class="button button-gold w-full sm:w-auto" data-focus-target="lectura-title">
                                <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <path d="m12 3 .8 2.5L15.5 6l-2.3 1.5.3 2.7L12 8.4l-1.5 1.8.3-2.7L8.5 6l2.7-.5L12 3ZM5 13l.6 1.7 1.8.3-1.5 1 .2 1.9L5 16.6l-1.1 1.3.2-1.9-1.5-1 1.8-.3L5 13Zm13 1 .7 2.2 2.3.4-1.9 1.3.3 2.3-1.4-1.7-1.4 1.7.3-2.3-1.9-1.3 2.3-.4L18 14Z" />
                                </svg>
                                Obtener mi lectura gratis
                            </a>
                            <span class="inline-flex items-center gap-2 text-xs font-semibold text-mystic-lavender/80">
                                <svg viewBox="0 0 24 24" class="size-4 text-mystic-gold" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                    <path d="M7.5 10V7.5a4.5 4.5 0 0 1 9 0V10M6 10h12v10H6V10Z" />
                                </svg>
                                Una lectura por correo verificado
                            </span>
                        </div>

                        <div class="mt-8 grid gap-3 sm:grid-cols-2">
                            <a href="#sesion" class="hero-access-card">
                                <span class="access-icon" aria-hidden="true">☾</span>
                                <span>
                                    <span class="access-label">Presencial / en vivo</span>
                                    <strong>Lectura en vivo</strong>
                                    <small>Conoce la experiencia personal</small>
                                </span>
                                <span aria-hidden="true">↗</span>
                            </a>
                            <a href="#paquetes" class="hero-access-card">
                                <span class="access-icon" aria-hidden="true">✧</span>
                                <span>
                                    <span class="access-label">Oráculo virtual</span>
                                    <strong>Lecturas virtuales</strong>
                                    <small>Explora los paquetes simbólicos</small>
                                </span>
                                <span aria-hidden="true">↗</span>
                            </a>
                        </div>
                    </div>

                    <div class="hero-deck" aria-label="Ilustración de una baraja mística">
                        <div class="deck-halo" aria-hidden="true"></div>
                        <div class="deck-card deck-card-left" aria-hidden="true">
                            <span>✦</span>
                        </div>
                        <div class="deck-card deck-card-right" aria-hidden="true">
                            <span>✦</span>
                        </div>
                        <div class="deck-card deck-card-main" aria-hidden="true">
                            <div class="flex w-full items-center justify-between text-mystic-gold">
                                <span>✦</span><span class="text-[0.58rem] font-bold uppercase tracking-[0.28em]">Oráculo eterno</span><span>✦</span>
                            </div>
                            <div class="card-orbit">
                                <span class="orbit-star">☆</span>
                                <svg viewBox="0 0 64 64" class="size-16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M16 40h32M20 40c0-10 5-16 12-16s12 6 12 16M24 45h16" />
                                    <path d="M32 13v5M16 22l4 3M48 22l-4 3" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="font-mystic text-2xl leading-none text-mystic-ivory">La armonía<br>cósmica</p>
                                <p class="mt-3 text-[0.58rem] font-semibold uppercase tracking-[0.28em] text-mystic-lavender">Balance & iluminación</p>
                            </div>
                            <div class="flex w-full items-center justify-between text-xs text-mystic-gold"><span>☾</span><span>XVIII</span><span>☼</span></div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="como-funciona" class="section-shell scroll-mt-20" aria-labelledby="steps-title">
                <div class="mystic-container py-20 sm:py-24">
                    <div class="section-heading">
                        <p class="eyebrow justify-center"><span aria-hidden="true">✦</span> El proceso encantado <span aria-hidden="true">✦</span></p>
                        <h2 id="steps-title">¿Cómo funciona la lectura?</h2>
                        <p>Tres pasos sencillos para abrir el portal y guardar tu experiencia de forma segura.</p>
                    </div>

                    <ol class="mt-12 grid gap-4 md:grid-cols-3">
                        <li class="step-card">
                            <span class="step-number">I</span>
                            <h3>Regístrate</h3>
                            <p>Comparte tu nombre y un correo al que tengas acceso para iniciar el recorrido.</p>
                            <span class="step-note">✧ Sin tarjetas ni suscripción</span>
                        </li>
                        <li class="step-card">
                            <span class="step-number">II</span>
                            <h3>Verifica tu correo</h3>
                            <p>En la experiencia final recibirás un enlace seguro que confirmará tu dirección.</p>
                            <span class="step-note">✧ Verificación pendiente de integración</span>
                        </li>
                        <li class="step-card">
                            <span class="step-number">III</span>
                            <h3>Accede por PIN</h3>
                            <p>El PIN sagrado será tu llave privada cuando la activación real esté disponible.</p>
                            <span class="step-note">✧ Acceso aún no habilitado</span>
                        </li>
                    </ol>
                </div>
            </section>

            <section id="lectura" class="scroll-mt-24 bg-mystic-ink px-4 py-20 sm:py-24" aria-labelledby="lectura-title">
                <div class="reading-panel mx-auto max-w-2xl">
                    <span class="panel-sigil" aria-hidden="true">☼</span>
                    <div class="text-center">
                        <p class="eyebrow justify-center">Prototipo interactivo</p>
                        <h2 id="lectura-title" tabindex="-1" class="mt-3 font-mystic text-3xl font-medium text-mystic-ivory outline-none sm:text-4xl">Activa tu consulta simbólica</h2>
                        <p class="mx-auto mt-3 max-w-lg text-sm leading-6 text-mystic-ivory/65">Completa los datos para revisar la experiencia. No guardaremos información ni enviaremos correos desde este prototipo.</p>
                    </div>

                    <form class="mt-8 grid gap-5" data-prototype-form novalidate>
                        <div class="form-field">
                            <label for="full-name">Tu nombre completo</label>
                            <div class="input-wrap">
                                <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <circle cx="12" cy="8" r="3.5" /><path d="M5 20c.5-4.2 2.8-6.5 7-6.5s6.5 2.3 7 6.5" />
                                </svg>
                                <input id="full-name" name="full-name" type="text" autocomplete="name" placeholder="Mariana Valenzuela" aria-describedby="full-name-error" required>
                            </div>
                            <p id="full-name-error" class="field-error" data-error-for="full-name" aria-live="polite"></p>
                        </div>

                        <div class="form-field">
                            <label for="email">Correo electrónico verificable</label>
                            <div class="input-wrap">
                                <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <rect x="3" y="5" width="18" height="14" rx="2" /><path d="m4 7 8 6 8-6" />
                                </svg>
                                <input id="email" name="email" type="email" inputmode="email" autocomplete="email" placeholder="mariana@destino.com" aria-describedby="email-error" required>
                            </div>
                            <p id="email-error" class="field-error" data-error-for="email" aria-live="polite"></p>
                        </div>

                        <button type="submit" class="button button-gold w-full">
                            <span aria-hidden="true">✧</span>
                            Validar datos del prototipo
                        </button>

                        <p class="prototype-status" data-form-status role="status" aria-live="polite">
                            <span aria-hidden="true">⌁</span>
                            Esta demostración no crea una cuenta, un PIN ni una lectura real.
                        </p>
                    </form>

                    <div class="mt-6 border-t border-mystic-lavender/10 pt-6 text-center">
                        <a href="#tirada" class="button button-secondary w-full sm:w-auto" data-focus-target="tirada-title">Probar la tirada de muestra</a>
                    </div>
                </div>
            </section>

            <section id="tirada" class="section-shell scroll-mt-20" aria-labelledby="tirada-title">
                <div class="mystic-container py-20 sm:py-28">
                    <div class="section-heading max-w-3xl">
                        <p class="eyebrow justify-center">Tirada de muestra</p>
                        <h2 id="tirada-title" tabindex="-1">Tu tirada tríptica del destino</h2>
                        <p>Revela cada arquetipo por separado. La interpretación es simbólica y está pensada como una pausa para reflexionar.</p>
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

                    <div class="mt-10 text-center">
                        <button type="button" class="button button-secondary" data-reset-reading disabled>Reiniciar tirada</button>
                    </div>
                </div>
            </section>

            <section id="paquetes" class="scroll-mt-20 bg-mystic-ink py-20 sm:py-28" aria-labelledby="packages-title">
                <div class="mystic-container">
                    <div class="section-heading">
                        <p class="eyebrow justify-center">Expansión astral</p>
                        <h2 id="packages-title">Paquetes de lecturas virtuales</h2>
                        <p>Opciones ilustrativas para futuras consultas. Los contenidos y valores se definirán antes de activar cualquier compra.</p>
                    </div>

                    <div class="mt-12 grid items-stretch gap-5 lg:grid-cols-3">
                        <article class="package-card">
                            <p class="package-label">Para comenzar</p>
                            <h3>Pack de consultas</h3>
                            <p class="package-price">Precio por definir</p>
                            <ul>
                                <li>✦ Consultas virtuales de muestra</li>
                                <li>✦ Acceso mediante PIN en una fase futura</li>
                                <li>✦ Condiciones por confirmar</li>
                            </ul>
                            <button type="button" class="button button-secondary mt-auto w-full" disabled>Próximamente</button>
                        </article>

                        <article class="package-card package-featured">
                            <span class="package-badge">Más elegido</span>
                            <p class="package-label">Acompañamiento</p>
                            <h3>Pack lunar</h3>
                            <p class="package-price">Precio por definir</p>
                            <ul>
                                <li>✦ Consultas virtuales de muestra</li>
                                <li>✦ Historial privado en una fase futura</li>
                                <li>✦ Condiciones por confirmar</li>
                            </ul>
                            <button type="button" class="button button-gold mt-auto w-full" disabled>Próximamente</button>
                        </article>

                        <article class="package-card">
                            <p class="package-label">Ciclo anual</p>
                            <h3>Acceso infinito</h3>
                            <p class="package-price">Precio por definir</p>
                            <ul>
                                <li>✦ Modalidad todavía por validar</li>
                                <li>✦ Recursos complementarios por definir</li>
                                <li>✦ Condiciones por confirmar</li>
                            </ul>
                            <button type="button" class="button button-secondary mt-auto w-full" disabled>Próximamente</button>
                        </article>
                    </div>
                </div>
            </section>

            <section id="sesion" class="section-shell scroll-mt-20 py-20 sm:py-28" aria-labelledby="live-title">
                <div class="mystic-container">
                    <div class="live-panel">
                        <div>
                            <p class="eyebrow">Encuentro personal</p>
                            <h2 id="live-title" class="mt-3 font-mystic text-4xl leading-none font-medium text-mystic-ivory sm:text-5xl">Agenda tu sesión en vivo con Diosa Mística</h2>
                            <p class="mt-5 max-w-2xl text-sm leading-7 text-mystic-ivory/68 sm:text-base">Un espacio íntimo por videollamada para explorar tus preguntas con calma. La agenda real y las condiciones se publicarán en una próxima fase.</p>
                            <ul class="mt-6 grid gap-3 text-sm text-mystic-lavender sm:grid-cols-2">
                                <li>✦ Acompañamiento uno a uno</li>
                                <li>✦ Duración por confirmar</li>
                                <li>✦ Modalidad por videollamada</li>
                                <li>✦ Sin reservas activas en el prototipo</li>
                            </ul>
                        </div>

                        <aside class="schedule-card" aria-label="Disponibilidad de sesiones">
                            <span class="schedule-icon" aria-hidden="true">☾</span>
                            <p class="eyebrow justify-center">Próxima disponibilidad</p>
                            <h3>Horarios por publicar</h3>
                            <p>Estamos preparando la agenda. Este módulo no permite reservar ni recopila datos todavía.</p>
                            <button type="button" class="button button-gold w-full" disabled>Reservas próximamente</button>
                        </aside>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="mystic-container py-14 sm:py-16">
                <div class="grid gap-10 border-b border-mystic-lavender/10 pb-10 md:grid-cols-[1.4fr_0.8fr_0.8fr]">
                    <div>
                        <a href="#inicio" class="brand w-fit" aria-label="Diosa Mística, volver al inicio">
                            <span class="brand-mark" aria-hidden="true">☾</span>
                            <span class="font-mystic text-xl font-semibold tracking-[0.18em]">DIOSA MÍSTICA</span>
                        </a>
                        <p class="mt-5 max-w-md text-sm leading-6 text-mystic-ivory/55">Una experiencia de introspección inspirada en símbolos y arquetipos. No sustituye orientación médica, psicológica, legal o financiera.</p>
                    </div>
                    <div>
                        <h2 class="footer-title">Explora</h2>
                        <nav class="footer-links" aria-label="Explorar">
                            <a href="#como-funciona">Cómo funciona</a>
                            <a href="#lectura">Lectura gratuita</a>
                            <a href="#tirada">Tirada de muestra</a>
                        </nav>
                    </div>
                    <div>
                        <h2 class="footer-title">Encuentros</h2>
                        <nav class="footer-links" aria-label="Encuentros">
                            <a href="#paquetes">Paquetes virtuales</a>
                            <a href="#sesion">Sesión en vivo</a>
                            @auth
                                <a href="{{ route('dashboard') }}">Mi espacio</a>
                            @else
                                <a href="{{ route('login') }}">Acceder</a>
                            @endauth
                        </nav>
                    </div>
                </div>
                <div class="flex flex-col gap-3 pt-7 text-xs text-mystic-ivory/42 sm:flex-row sm:items-center sm:justify-between">
                    <p>© {{ date('Y') }} Diosa Mística. Todos los derechos reservados.</p>
                    <p>Lectura simbólica · Prototipo sin transacciones</p>
                </div>
            </div>
        </footer>
    </body>
</html>
