window.wheelSlider = function (wheel) {
    const minQueueValues = 3;


    const wrapper = document.createElement('div');
    wrapper.classList.add('values-wrapper');
    wheel.appendChild(wrapper);

    let fixSize = wheel.querySelector('.wheel-initial-width-placeholder');
    if (!fixSize) {
        const fixSize = document.createElement('span');
        fixSize.innerHTML = 'AaBbCc';
        fixSize.style.visibility = 'hidden';
    } else {
        wheel.removeChild(fixSize);
    }
    const fixSizeWrapper = document.createElement('div');
    fixSizeWrapper.appendChild(fixSize);
    fixSizeWrapper.classList.add('value');
    wheel.appendChild(fixSizeWrapper);
    function fixSizeCallback() {
        wrapper.style.height = fixSizeWrapper.offsetHeight * 3 + "px";
    }
    window.addEventListener('resize', fixSizeCallback);
    fixSizeCallback();


    const initialNodes = wheel.getAttribute('data-values').split('|')
        .map(v => {
            const valueElement = document.createElement('div');
            valueElement.innerHTML = v;
            valueElement.classList.add('value');
            return valueElement;
        });


    const values = [...initialNodes];
    for (let i = 1; i <= minQueueValues - initialNodes.length; i++) {
        values.push(/** @type HTMLDivElement */initialNodes[i % initialNodes.length].cloneNode(true));
    }

    const queue = [];
    for (let i = 0; i < values.length; i++) {
        queue.push(values[(i + Math.floor(minQueueValues / 2)) % values.length]);
    }

    for (let i = 0; i < queue.length; i++) {
        wrapper.appendChild(queue[i]);
    }

    next();

    function next() {
        queue[0].classList.remove('previous');
        queue[1].classList.remove('current');
        queue[2].classList.remove('next');
        queue.push(queue.shift());
        queue[0].classList.add('previous');
        queue[1].classList.add('current');
        queue[2].classList.add('next');
    }

    const delayMs = Number(wheel.getAttribute('data-delay-ms') || '2000');

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
