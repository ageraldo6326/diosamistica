const initializeLandingPage = () => {
    const landingPage = document.querySelector('[data-landing]');

    if (!landingPage) {
        return;
    }

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

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

    const prototypeForm = document.querySelector('[data-prototype-form]');

    if (prototypeForm) {
        const fullName = prototypeForm.querySelector('#full-name');
        const email = prototypeForm.querySelector('#email');
        const status = prototypeForm.querySelector('[data-form-status]');

        const setFieldError = (field, message) => {
            const error = prototypeForm.querySelector(`[data-error-for="${field.id}"]`);

            field.setAttribute('aria-invalid', message ? 'true' : 'false');
            error.textContent = message;
        };

        [fullName, email].forEach((field) => {
            field.addEventListener('input', () => {
                setFieldError(field, '');
                status.classList.remove('is-success');
                status.textContent = 'Esta demostración no crea una cuenta, un PIN ni una lectura real.';
            });
        });

        prototypeForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const nameIsValid = fullName.value.trim().length > 0;
            const emailIsValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim());

            setFieldError(fullName, nameIsValid ? '' : 'Escribe tu nombre para continuar.');
            setFieldError(email, emailIsValid ? '' : 'Escribe un correo válido, por ejemplo nombre@dominio.com.');

            if (!nameIsValid || !emailIsValid) {
                (nameIsValid ? email : fullName).focus();
                status.classList.remove('is-success');
                status.textContent = 'Revisa los campos indicados. Ningún dato fue enviado.';

                return;
            }

            status.classList.add('is-success');
            status.textContent = 'Los datos tienen un formato válido. El prototipo no los guardó ni envió un correo.';
        });
    }

    const reading = document.querySelector('[data-tarot-reading]');
    const resetButton = document.querySelector('[data-reset-reading]');
    const announcement = document.getElementById('card-announcement');

    if (reading && resetButton && announcement) {
        const cards = [...reading.querySelectorAll('[data-tarot-card]')];

        const updateResetButton = () => {
            resetButton.disabled = !cards.some((card) => card.classList.contains('is-revealed'));
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
    document.addEventListener('DOMContentLoaded', initializeLandingPage);
} else {
    initializeLandingPage();
}
