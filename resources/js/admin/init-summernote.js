import 'summernote/dist/summernote-lite.css';
import 'summernote/dist/summernote-lite';

export function initSummernote(selector = '#summernote', options = {}) {
    $(document).ready(function () {

        const $textarea = $(selector);

        const textareaClasses = $textarea.attr('class');

        // Function to apply dark or light theme to Summernote
        const applyTheme = () => {
            const isDark = document.documentElement.classList.contains('dark');

            // Toggle classes on the Summernote editor wrapper
            $textarea.next('.note-editor')
                .toggleClass('dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700', isDark)
                .toggleClass('text-gray-900 bg-white border-gray-300', !isDark);

            // Toggle classes on the Summernote editing area
            $textarea.next('.note-editor').find('.note-editing-area')
                .toggleClass('dark:bg-gray-700 dark:text-gray-300', isDark)
                .toggleClass('bg-white text-gray-900', !isDark);

            // Toggle classes on the editable content area and add textarea's original classes
            $textarea.next('.note-editor').find('.note-editable')
                .toggleClass('dark:bg-gray-700 dark:text-gray-300', isDark)
                .toggleClass('bg-white text-gray-900', !isDark)
                .addClass(textareaClasses);
        };

        // Initialize Summernote with toolbar and options
        $textarea.summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            placeholder: 'Enter content here...'
        });

        // Apply theme after initializing Summernote
        applyTheme();

        // Observe changes in the `class` attribute of `<html>` to detect dark mode toggle
        const observer = new MutationObserver(() => applyTheme());
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });


    });
}
