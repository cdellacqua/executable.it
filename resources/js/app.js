require('./bootstrap');
require('./async-img');

function onDOMLoaded(callback) {
    document.addEventListener('DOMContentLoaded', callback);
}

onDOMLoaded(() => {
    // document.querySelector('aside .main-nav').classList.add('reveal-left');
    // document.querySelector('.catch-you img').classList.add('reveal-right');
});

// Navigation menu highlighting
onDOMLoaded(() => {
    document.querySelectorAll('.main-nav').forEach((nav) => {
        /** @type HTMLAnchorElement[] */
        const anchors = Array.from(nav.querySelectorAll('a'));
        const anchorIndex = anchors.findIndex((/** HTMLAnchorElement */a) => a.pathname === location.pathname);
        if (anchorIndex !== -1) {
            const a = anchors[anchorIndex];
            a.classList.add('active');
            a.parentElement.classList.add('active');
            a.classList.add('tooltip');
            a.dataset.tooltip = a.parentElement.parentElement.dataset.tooltip;
        }
    });
});

// Navigation menu scroll behaviour
onDOMLoaded(() => {
    const navTop = document.querySelector('.main-nav');
    const navBottom = document.querySelector('.main-nav.bottom');
    const bottomSpacer = document.querySelector('.mobile-bottom-menu-spacer');
    function setNavPosition() {
        const scroll = (window.scrollY !== undefined ? window.scrollY : document.documentElement.scrollTop) - navTop.offsetTop;
        navBottom.style.bottom = Math.min(-navTop.scrollHeight + scroll, 0) + "px";
        bottomSpacer.style.height = navTop.scrollHeight + "px";
        bottomSpacer.style.display = scroll > 0 ? "block" : "none";
    }

    setNavPosition();

    window.addEventListener('scroll', setNavPosition);
});
