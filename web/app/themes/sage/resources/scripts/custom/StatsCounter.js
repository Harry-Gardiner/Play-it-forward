import { CountUp } from 'countup.js';

function animateNumbers() {
    const options = {
        startVal: 0,
        duration: 2,
        separator: ',',
        enableScrollSpy: true,
        scrollSpyDelay: 200,
        scrollSpyOnce: true,
    };

    const numbers = document.querySelectorAll('.custom-grid__stat__number');
    numbers.forEach((number) => {
        console.log(number.textContent);

        const countUp = new CountUp(number.id, Number(number.textContent), options);

        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    });
}

animateNumbers();