
export default () => {

    const ud_header = document.querySelector('.header');
    const scrollWatcher = document.createElement('div');
    ud_header.before(scrollWatcher);

    const observer = new IntersectionObserver(
        ([entry]) => {
            ud_header.classList.toggle('sticky', !entry.isIntersecting);
        },
        { threshold: 0}
    )

    observer.observe(scrollWatcher);

}
