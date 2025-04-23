import {scrollIntoView} from "seamless-scroll-polyfill";


export default () => {
    const messageDivs = document.getElementsByClassName('scroll-message');
    if(messageDivs.length > 0) {
        scrollIntoView(messageDivs[0],
            { behavior: "smooth",
                block: "center",
                inline: "center" }
        );
    }
}
