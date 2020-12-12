if (window.scrollY === undefined) {
    Object.defineProperty(window, 'scrollY', {
        get() {
            return window.pageYOffset;
        }
    });
}
