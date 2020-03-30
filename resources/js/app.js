require('./polyfill');

require('./bootstrap');
require('./async-img');
require('./wheel-slider');
require('./expandable');
require('./element-scrollY');

// Reveal sidebar
document.addEventListener('DOMContentLoaded', () => {
    // document.querySelector('aside .main-nav').classList.add('reveal-left');
    // document.querySelector('.catch-you img').classList.add('reveal-right');
});

document.addEventListener('DOMContentLoaded', () => {
    window.addEventListener('scroll', () => {
        document.querySelectorAll('.opacity-on-scroll').forEach((element) => {
            const yValue = elementScrollY(element) + element.offsetHeight / 2;
            if (
                yValue >= window.scrollY + .05 * window.innerHeight
                && yValue <= window.scrollY + (1-0.05) * window.innerHeight
            ) {
                element.classList.remove('outside-visible-area');
            } else {
                element.classList.add('outside-visible-area');
            }
        });
    });
});

// Navigation menu highlighting
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.main-nav').forEach((nav) => {
        /** @type HTMLAnchorElement[] */
        const anchors = Array.from(nav.querySelectorAll('a'));
        const anchorIndex = anchors.findIndex((/** HTMLAnchorElement */a) => a.pathname === location.pathname);
        if (anchorIndex !== -1) {
            const a = anchors[anchorIndex];
            a.classList.add('active');
            a.parentElement.classList.add('active');
            a.classList.add('tooltip');
            a.setAttribute('data-tooltip', a.parentElement.parentElement.getAttribute('data-tooltip'));
        }
    });
});

// Navigation menu scroll behaviour
document.addEventListener('DOMContentLoaded', () => {
    const navTop = document.querySelector('.main-nav');
    const navBottom = document.querySelector('.main-nav.bottom');
    const bottomSpacer = document.querySelector('.mobile-bottom-menu-spacer');
    function setNavPosition() {
        const scroll = window.scrollY - navTop.offsetTop;
        navBottom.style.bottom = Math.min(-navTop.scrollHeight + scroll, 0) + 'px';
        bottomSpacer.style.height = navTop.scrollHeight + 'px';
        bottomSpacer.style.display = scroll > 0 ? 'block' : 'none';
    }

    setNavPosition();

    window.addEventListener('scroll', setNavPosition);
});

// form
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.form-contact').forEach(form => {
        form.addEventListener('submit', () => form.querySelector('[type="submit"]').classList.add('disabled', 'loading'));
        const eaddressElement = form.querySelector('.eaddress');
        eaddressElement.setAttribute('data-tooltip', eaddressElement.getAttribute('data-tooltip-hover'));
        eaddressElement.addEventListener('click', function () {
            const eaddress = 'kizdg&lmddiky}iHmpmk}|ijdm&a|';
            const input = document.createElement('input');
            input.value = eaddress.split('').map(x => x.charCodeAt(0)).map(x => String.fromCharCode(x ^ 8)).join('');
            input.style.position = 'absolute';
            input.style.opacity = '0';
            document.body.appendChild(input);
            input.select();
            input.setSelectionRange(0, input.value.length);
            document.execCommand('copy');
            document.body.removeChild(input);
            eaddressElement.setAttribute('data-tooltip', eaddressElement.getAttribute('data-tooltip-copied'));
        });
        eaddressElement.addEventListener('mouseout', () => setTimeout(() => eaddressElement.setAttribute('data-tooltip', eaddressElement.getAttribute('data-tooltip-hover')), 200));
    });
});
