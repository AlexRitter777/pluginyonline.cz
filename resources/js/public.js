import '../../node_modules/glightbox/dist/css/glightbox.min.css';
//import '../css/public/animate.css';
//import '../css/public/style.css';

//import imagesLoaded from 'imagesloaded';
//import Isotope from 'isotope-layout';
import GLightbox from 'glightbox';
import WOW from 'wowjs';

document.addEventListener('DOMContentLoaded', () => {

    window.wow = new WOW.WOW({
        live: false,
    });

    window.wow.init({
        offset: 50,
    });

    //Moves the portfolio content container based on screen size.
    initResponsivePortfolioContent();


// ========= glightbox
    /*const myGallery = GLightbox({
        type: 'image',
    });*/

//============== isotope masonry js with imagesloaded
    /*imagesLoaded('.portfolio-container', function () {
      var elem = document.querySelector('.items-wrapper');
      var iso = new Isotope(elem, {
        // options
        itemSelector: '.item',
        masonry: {
          // use outer width of sizer for columnWidth
          columnWidth: '.item',
        },
      });

      let filterButtons = document.querySelectorAll('.portfolio-buttons button');
      filterButtons.forEach((e) =>
        e.addEventListener('click', () => {
          let filterValue = event.target.getAttribute('data-filter');
          iso.arrange({
            filter: filterValue,
          });
        })
      );
    });

    var elements = document.querySelectorAll('.portfolio-buttons button');
    for (var i = 0; i < elements.length; i++) {
      elements[i].onclick = function () {
        var el = elements[0];
        while (el) {
          if (el.tagName === 'BUTTON') {
            el.classList.remove('active');
          }
          el = el.nextSibling;
        }
        this.classList.add('active');
      };
    }*/

    (function () {
        'use strict';

        // ======= Sticky
        window.onscroll = function () {
            const ud_header = document.querySelector('.header');
            const sticky = ud_header.offsetTop;

            if (window.pageYOffset > sticky) {
                ud_header.classList.add('sticky');
            } else {
                ud_header.classList.remove('sticky');
            }

            // show or hide the back-top-top button
            const backToTop = document.querySelector('.back-to-top');
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                backToTop.style.display = 'flex';
            } else {
                backToTop.style.display = 'none';
            }
        };

        // ===== responsive navbar
        let navbarToggler = document.querySelector('#navbarToggler');
        const navbarCollapse = document.querySelector('#navbarCollapse');

        navbarToggler.addEventListener('click', () => {
            navbarToggler.classList.toggle('navbarTogglerActive');
            navbarCollapse.classList.toggle('hidden');
        });

        //===== close navbar-collapse when a  clicked
        document.querySelectorAll('#navbarCollapse ul li:not(.submenu-item) a').forEach((e) =>
            e.addEventListener('click', () => {
                navbarToggler.classList.remove('navbarTogglerActive');
                navbarCollapse.classList.add('hidden');
            })
        );

        // ===== Sub-menu
        const submenuItems = document.querySelectorAll('.submenu-item');
        submenuItems.forEach((el) => {
            el.querySelector('a').addEventListener('click', () => {
                el.querySelector('.submenu').classList.toggle('hidden');
            });
        });

        // ====== scroll top js
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
    })();





    const imageCarousel = () => {
        const carousel = document.querySelector('.project-images-carousel');
        if (!carousel) {
            return;
        }
        const thumbnails = document.querySelectorAll('.project-image-thumbnails img');
        const activeImage = document.getElementById('activeImage');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');


        let currentIndex = 0;

        // Initialize active thumbnail class
        thumbnails.forEach((thumbnail, index) => {
            if (thumbnail.src === activeImage.src) {
                thumbnail.classList.add('active-thumbnail');
                currentIndex = index;
            }
        });

        // Function to update the active image and thumbnail
        const updateActiveImage = (index) => {
            activeImage.src = thumbnails[index].src;
            thumbnails.forEach(thumbnail => thumbnail.classList.remove('active-thumbnail'));
            thumbnails[index].classList.add('active-thumbnail');
        };

        // Add click event listeners to thumbnails
        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', () => {
                currentIndex = index;
                updateActiveImage(currentIndex);
            });
        });

        // Add click event listener to the previous button
        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
            updateActiveImage(currentIndex);
        });

        // Add click event listener to the next button
        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % thumbnails.length;
            updateActiveImage(currentIndex);
        });
    }

    imageCarousel();






});

/**
 * Moves the portfolio content container based on screen size.
 */
const initResponsivePortfolioContent = () => {

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

