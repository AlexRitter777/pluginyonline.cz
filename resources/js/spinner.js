
/**
 * Spinner loader based on bootstrap styles
 *
 * Receives submitter event
 * @param {HTMLElement} button - The submit button that was pressed
 */
export function loaderSpinnerOn(button) {
    // Wrap the button in a jQuery object
    let $button = $(button);

    // Add spinner to the pressed button
    $button
        .html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> loading...`);

    // Disable all submit buttons on the page to prevent multiple form submissions
    $(':submit').attr('disabled', 'disabled');
}

export function loaderSpinnerOff(){
   //
}
