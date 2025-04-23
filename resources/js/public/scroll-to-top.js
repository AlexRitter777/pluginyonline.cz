export default () => {

    const backToTop = document.querySelector('.back-to-top');// move to scroll to TOP

    window.addEventListener('scroll', () => {

        if (backToTop) { // move to scroll to TOP
            backToTop.style.display = (window.scrollY > 50) ? 'flex' : 'none';
        }

    })


    function scrollTo(element, to = 0, duration = 500) {
        const start = element.scrollTop;
        const change = to - start;
        const increment = 20;
        let currentTime = 0;

        const animateScroll = () => {
            currentTime += increment;

            const val = Math.easeInOutQuad(currentTime, start, change, duration);

            element.scrollTop = val;

            if (currentTime < duration) {
                setTimeout(animateScroll, increment);
            }
        };

        animateScroll();
    }

    Math.easeInOutQuad = function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
    };

    document.querySelector('.back-to-top').onclick = () => {
        scrollTo(document.documentElement);
    };


}
