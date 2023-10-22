function debounce(func, wait, immediate) {
    let timeout;
    return function () {
        let context = this, args = arguments;
        let later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        let callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}


const backToTopBtn = document.getElementById("backToTopBtn");

const scrollHandler = debounce(function () {
    console.log(document.body.scrollTop);
    if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
        backToTopBtn.classList.add("show");
        backToTopBtn.classList.remove("hide");
    } else {
        backToTopBtn.classList.add("hide");
        backToTopBtn.classList.remove("show");
    }
}, 50);

window.addEventListener("scroll", scrollHandler);

backToTopBtn.addEventListener("click", function () {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
});
