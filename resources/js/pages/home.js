document.addEventListener('DOMContentLoaded', () => {
    const firstScroll = document.querySelector('.first-scroll');
    function firstScrollHeight() {
        firstScroll.style.minHeight = window.innerHeight - document.querySelector('.mobile-menu-wrapper').offsetHeight + 'px';
    }
    firstScrollHeight();
    let oldWidth = window.innerWidth;
    window.addEventListener('resize', () => {
        if (oldWidth !== window.innerWidth) {
            firstScrollHeight();
            oldWidth = window.innerWidth;
        } // else -> fake resize in Safari/Chrome mobile
    });
});
