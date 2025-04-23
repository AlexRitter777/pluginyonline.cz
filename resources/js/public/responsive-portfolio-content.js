/**
 * Moves the portfolio content container based on screen size.
 */
export default () => {

    const portfolioContent = document.getElementById('portfolio-content');
    const contentContainer = document.getElementById('content-container');
    const carouselContainer = document.getElementById('carousel-container');

    if (!portfolioContent || !contentContainer || !carouselContainer) return;

    const moveContent = (matches) => {
        if (matches) {
            if (carouselContainer.contains(portfolioContent)) {
                contentContainer.appendChild(portfolioContent);
            }
        } else {
            if (!carouselContainer.contains(portfolioContent)) {
                carouselContainer.appendChild(portfolioContent);
            }
        }
    }

    const mediaQuery = window.matchMedia('(max-width: 960px)');

    //...on page load
    moveContent(mediaQuery.matches);

    //...on change matches
    mediaQuery.addEventListener('change', (e) => {
        moveContent(e.matches);
    });

}
