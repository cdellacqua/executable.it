document.addEventListener('DOMContentLoaded', () => {
    [...document.querySelectorAll('.timeline')].forEach((timeline) => {
        const lastItem = timeline.querySelector('.timeline-item:last-child');
        function triggerPulse() {
            if (
                window.scrollY > elementScrollY(timeline)
                || (window.scrollY + window.innerHeight > elementScrollY(lastItem))
            ) {
                timeline.classList.add('pulse');
                window.removeEventListener('scroll', triggerPulse);
            }
        }
        window.addEventListener('scroll', triggerPulse);
    });
});
