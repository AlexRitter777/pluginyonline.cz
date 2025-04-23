
export default () => {

    const ud_header = document.querySelector('.header');

    window.addEventListener('scroll', () => {
        if (ud_header) {
            ud_header.classList.toggle('sticky', window.pageYOffset > ud_header.offsetTop);
        }

    })


}
