const initializePublicPage = () => {
    const publicPage = document.querySelector('[data-public-page]');

    if (!publicPage) {
        return;
    }

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    const heroDeck = document.querySelector('[data-hero-deck]');

    if (heroDeck) {
        const mainImage = heroDeck.querySelector('[data-hero-card-main]');
        const leftImage = heroDeck.querySelector('[data-hero-card-left]');
        const rightImage = heroDeck.querySelector('[data-hero-card-right]');
        const arcana = heroDeck.querySelector('[data-hero-card-arcana]');
        const title = heroDeck.querySelector('[data-hero-card-title]');
        const keywords = heroDeck.querySelector('[data-hero-card-keywords]');

        if (mainImage && leftImage && rightImage && arcana && title && keywords) {
            const cards = [
                {
                    image: mainImage.src,
                    arcana: 'Arcano XI',
                    title: 'La Justicia',
                    keywords: 'Balance · elección · verdad',
                },
                {
                    image: rightImage.src,
                    arcana: 'Arcano XIX',
                    title: 'El Sol',
                    keywords: 'Expansión · confianza · visión',
                },
                {
                    image: leftImage.src,
                    arcana: 'Seis de Copas',
                    title: 'Raíz viajera',
                    keywords: 'Origen · memoria · impulso',
                },
            ];
            let currentCardIndex = 0;

            const renderCard = (cardIndex) => {
                const previousCardIndex = (cardIndex + cards.length - 1) % cards.length;
                const nextCardIndex = (cardIndex + 1) % cards.length;
                const card = cards[cardIndex];

                leftImage.src = cards[previousCardIndex].image;
                mainImage.src = card.image;
                rightImage.src = cards[nextCardIndex].image;
                arcana.textContent = card.arcana;
                title.textContent = card.title;
                keywords.textContent = card.keywords;
            };

            const showNextCard = () => {
                heroDeck.classList.add('is-changing');

                window.setTimeout(() => {
                    currentCardIndex = (currentCardIndex + 1) % cards.length;
                    renderCard(currentCardIndex);

                    window.requestAnimationFrame(() => {
                        heroDeck.classList.remove('is-changing');
                    });
                }, 720);
            };

            if (!prefersReducedMotion.matches) {
                window.setInterval(showNextCard, 5600);
            }
        }
    }

    document.querySelectorAll('[data-focus-target]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const targetId = link.dataset.focusTarget;
            const target = document.getElementById(targetId);

            if (!target) {
                return;
            }

            event.preventDefault();
            target.scrollIntoView({
                behavior: prefersReducedMotion.matches ? 'auto' : 'smooth',
                block: 'start',
            });

            window.setTimeout(() => {
                target.focus({ preventScroll: true });
            }, prefersReducedMotion.matches ? 0 : 400);
        });
    });

    document.querySelectorAll('.mobile-menu-panel a').forEach((link) => {
        link.addEventListener('click', () => {
            link.closest('details')?.removeAttribute('open');
        });
    });

    const servicesSection = document.querySelector('.services-section');

    if (servicesSection && 'IntersectionObserver' in window) {
        const catalogObserver = new IntersectionObserver((entries, observer) => {
            if (!entries.some((entry) => entry.isIntersecting)) {
                return;
            }

            servicesSection.classList.add('is-in-view');
            observer.disconnect();
        }, { threshold: 0.12 });

        catalogObserver.observe(servicesSection);
    }

    const conversionHero = document.querySelector('[data-conversion-hero]');
    const mobileConversionBar = document.querySelector('[data-mobile-conversion-bar]');
    const stickyCtaHideZones = [...document.querySelectorAll('[data-sticky-cta-hide]')];

    if (conversionHero && mobileConversionBar && stickyCtaHideZones.length > 0 && 'IntersectionObserver' in window) {
        let heroIsVisible = true;
        const visibleHideZones = new Set();

        const updateMobileConversionBar = () => {
            mobileConversionBar.hidden = heroIsVisible || visibleHideZones.size > 0;
        };

        const heroObserver = new IntersectionObserver((entries) => {
            heroIsVisible = entries[0].isIntersecting;
            updateMobileConversionBar();
        }, { threshold: 0.08 });

        const hideZoneObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    visibleHideZones.add(entry.target);
                } else {
                    visibleHideZones.delete(entry.target);
                }
            });

            updateMobileConversionBar();
        }, { threshold: 0.05 });

        heroObserver.observe(conversionHero);
        stickyCtaHideZones.forEach((zone) => hideZoneObserver.observe(zone));
    }

    const serviceButtons = [...document.querySelectorAll('[data-select-service]')];
    const selectedServiceName = document.querySelector('[data-selected-service-name]');
    const selectedServiceMessage = document.querySelector('[data-selected-service-message]');
    const selectedServiceDetails = document.querySelector('[data-selected-service-details]');
    const selectedServicePrice = document.querySelector('[data-selected-service-price]');
    const serviceAnnouncement = document.querySelector('[data-service-announcement]');

    if (
        serviceButtons.length > 0
        && selectedServiceName
        && selectedServiceMessage
        && selectedServiceDetails
        && selectedServicePrice
        && serviceAnnouncement
    ) {
        serviceButtons.forEach((button) => {
            const serviceCard = button.closest('[data-service-card]');

            button.addEventListener('click', () => {
                serviceButtons.forEach((serviceButton) => {
                    serviceButton.setAttribute('aria-pressed', 'false');
                    serviceButton.closest('[data-service-card]')?.classList.remove('is-selected');
                });

                button.setAttribute('aria-pressed', 'true');
                button.closest('[data-service-card]')?.classList.add('is-selected');
                selectedServiceName.textContent = button.dataset.serviceName;
                selectedServiceMessage.textContent = 'Buena elección. Esta lectura queda marcada mientras comparas las demás opciones.';
                selectedServicePrice.textContent = button.dataset.servicePrice;
                selectedServiceDetails.hidden = false;
                serviceAnnouncement.textContent = `${button.dataset.serviceName}, ${button.dataset.servicePrice}, seleccionada. Reservas en línea próximamente.`;
            });

            serviceCard?.addEventListener('click', (event) => {
                if (event.target.closest('a, button')) {
                    return;
                }

                button.click();
            });
        });
    }

    const reading = document.querySelector('[data-tarot-reading]');
    const resetButton = document.querySelector('[data-reset-reading]');
    const readingCta = document.querySelector('[data-reading-cta]');
    const announcement = document.getElementById('card-announcement');

    if (reading && resetButton && readingCta && announcement) {
        const cards = [...reading.querySelectorAll('[data-tarot-card]')];

        const updateResetButton = () => {
            const hasRevealedCard = cards.some((card) => card.classList.contains('is-revealed'));

            resetButton.disabled = !hasRevealedCard;
            readingCta.hidden = !hasRevealedCard;
        };

        cards.forEach((card) => {
            const button = card.querySelector('[data-reveal-card]');
            const interpretation = card.querySelector('[data-card-interpretation]');

            button.addEventListener('click', () => {
                if (card.dataset.turning === 'true' || card.classList.contains('is-revealed')) {
                    return;
                }

                card.dataset.turning = 'true';
                card.classList.add('is-revealed');
                button.setAttribute('aria-expanded', 'true');
                updateResetButton();

                window.setTimeout(() => {
                    interpretation.hidden = false;
                    card.dataset.turning = 'false';
                    announcement.textContent = `${card.dataset.cardName} ha sido revelada. ${interpretation.textContent.trim()}`;
                }, prefersReducedMotion.matches ? 0 : 520);
            });
        });

        resetButton.addEventListener('click', () => {
            cards.forEach((card) => {
                card.classList.remove('is-revealed');
                card.dataset.turning = 'false';
                card.querySelector('[data-reveal-card]').setAttribute('aria-expanded', 'false');
                card.querySelector('[data-card-interpretation]').hidden = true;
            });

            updateResetButton();
            announcement.textContent = 'La tirada de muestra se ha reiniciado.';
            cards[0].querySelector('[data-reveal-card]').focus();
        });
    }
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializePublicPage);
} else {
    initializePublicPage();
}
