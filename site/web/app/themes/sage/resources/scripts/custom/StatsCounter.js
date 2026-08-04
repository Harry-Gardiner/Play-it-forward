import { CountUp } from 'countup.js';

function animateNumbers() {
    const options = {
        startVal: 0,
        duration: 3,
        separator: ',',
        enableScrollSpy: true,
        scrollSpyOnce: true,
        useEasing: true,
        smartEasingThreshold: 999,
        smartEasingAmount: 333,
    };

    const numbers = document.querySelectorAll('.custom-grid__stat__number');
    numbers.forEach((number) => {
        const value = Number(number.textContent);

        // Non-numeric stats (e.g. plain text) are left as static content.
        if (Number.isNaN(value) || number.textContent.trim() === '') {
            return;
        }

        const countUp = new CountUp(number.id, value, options);

        // after DOM has rendered
        countUp.handleScroll();

        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    });
}

animateNumbers();