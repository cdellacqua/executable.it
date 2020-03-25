window.wheelSlider = function (wheel) {
    const wrapper = document.createElement('div');
    wrapper.classList.add('values-wrapper');
    wheel.appendChild(wrapper);

    if (!wheel.querySelector('.wheel-initial-width-placeholder')) {
        const fixSize = document.createElement('span');
        fixSize.innerHTML = 'AaBbCc';
        fixSize.style.visibility = "hidden";
        wheel.appendChild(fixSize);
    }

    const values = wheel.dataset.values.split('|');
    values.map(v => {
        const valueElement = document.createElement('div');
        valueElement.innerHTML = v;
        valueElement.classList.add('value');
        return valueElement;
    }).forEach(e => wrapper.appendChild(e));

    let i = 0;
    let delta = 1;

    function next() {
        wrapper.children[i].classList.remove('active');

        i += delta;
        if (i < 0 || i >= values.length) {
            delta *= -1;
            i += 2*delta;
        }

        wrapper.children[i].classList.add('active');

        wrapper.style.transform = `translateY(-${i * 100 / values.length}%)`;
    }

    const delayMs = Number(wheel.dataset.delayMs || '2000');

    next();

    let lastUpdate = new Date().getTime();
    function animation() {
        const currentUpdate = new Date().getTime();
        if (currentUpdate - lastUpdate > delayMs) {
            next();
            lastUpdate = currentUpdate;
        }
        requestAnimationFrame(animation);
    }

    animation();
};
