document.addEventListener('DOMContentLoaded',() => {
    document.querySelectorAll('.async-img-container').forEach(container => {
        const div = container.querySelector('.async-img');
        if (div.dataset.ratio) {
            div.style.paddingBottom = Number(div.dataset.ratio) * 100 + "%";
        }
        const image = new Image();
        const blurDelay = setTimeout(() => container.classList.add('-loading'), 100);
        image.addEventListener('load', () => {
            clearTimeout(blurDelay);
            div.style.backgroundImage = `url(${div.dataset.src})`;
            if (container.classList.contains('-loading')) {
                container.classList.add('-loaded');
            }
        });
        image.addEventListener('error', () => {
            container.classList.add('-error');
        });
        image.src = div.dataset.src;
    });
});
