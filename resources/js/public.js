import Alpine from 'alpinejs';
import initStickyHeader from "./public/init-sticky-header.js";
import imageCarousel from "./public/init-images-carousel.js";
import initResponsivePortfolioContent from "./public/responsive-portfolio-content.js";
import responsiveNavbar from "./public/responsive-navbar.js";
import scrollToTop from "./public/scroll-to-top.js";
import contactForm from "./public/contact-form.js";


window.Alpine = Alpine;
Alpine.data('contactForm', contactForm);
Alpine.start();

//Moves the portfolio content container based on screen size.
initResponsivePortfolioContent();

//Init image carousel
imageCarousel();

//Init sticky header and back on top button
initStickyHeader();

//Init responsive navbar
responsiveNavbar();

//Scroll to Top
scrollToTop();














