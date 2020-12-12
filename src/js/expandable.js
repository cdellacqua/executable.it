window.expandable = function (resizable, toggle) {
    let height = resizable.offsetHeight;
    resizable.style.maxHeight = '0';
    resizable.classList.add('expandable');
    toggle.addEventListener('click', () => {
        if (resizable.classList.contains('open')) {
            resizable.style.maxHeight = '0';
        } else {
            resizable.style.maxHeight = height + 'px';
        }

        resizable.classList.toggle('open');
        toggle.classList.toggle('open');
    });
};
