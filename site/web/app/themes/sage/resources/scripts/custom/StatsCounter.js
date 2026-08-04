import { CountUp } from 'countup.js';

function animateNumbers() {
    const numbers = document.querySelectorAll('.custom-grid__stat__number');
    numbers.forEach((number) => {
        const text = number.textContent.trim();
        const value = Number(text);

        // Non-numeric stats (e.g. plain text) are left as static content.
        if (Number.isNaN(value) || text === '') {
            return;
        }

        const decimalMatch = text.match(/\.(\d+)/);
        const decimalPlaces = decimalMatch ? decimalMatch[1].length : 0;

        const options = {
            startVal: 0,
            duration: 3,
            separator: ',',
            decimalPlaces,
            enableScrollSpy: true,
            scrollSpyOnce: true,
            useEasing: true,
            smartEasingThreshold: 999,
            smartEasingAmount: 333,
        };

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