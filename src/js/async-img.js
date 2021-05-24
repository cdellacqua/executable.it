document.addEventListener('DOMContentLoaded',() => {
    [...document.querySelectorAll('.async-img-container')].forEach(container => {
        const img = container.querySelector('img');
        const placeholder = container.querySelector('.async-img-placeholder');
        if (placeholder.getAttribute('data-ratio')) {
            placeholder.style.paddingBottom =  1 / Number(placeholder.getAttribute('data-ratio')) * 100 + '%';
        }
        const blurDelay = setTimeout(() => container.classList.add('-loading'), 100);
        function onload() {
            clearTimeout(blurDelay);
            if (container.classList.contains('-loading')) {
                container.classList.add('-loaded');
            }
        }
        if (img.complete) {
            onload();
        } else {
            img.addEventListener('load', onload);
            img.addEventListener('error', onload);
        }
    });
});
