import 'summernote/dist/summernote-lite.css';
import 'summernote/dist/summernote-lite';

export function initSummernote(selector = '#summernote', options = {}) {
    $(document).ready(function () {

        const $textarea = $(selector);

        const textareaClasses = $textarea.attr('class');

        // Function to apply dark or light theme to Summernote
        const applyTheme = () => {
            const isDark = document.documentElement.classList.contains('dark');

            $textarea.next('.note-editor').find('.note-editable')
                .toggleClass('dark:bg-gray-700 dark:text-gray-300', isDark)
                .addClass(textareaClasses);

            $textarea.next('.note-editor').find('.note-toolbar')
                .toggleClass('dark:bg-gray-700', isDark);

            $textarea.next('.note-editor').find('.note-toolbar .note-btn-group')
                .toggleClass('dark:bg-gray-700', isDark)

            $textarea.next('.note-editor').find('.note-toolbar .note-btn-group .note-btn')
                .toggleClass('dark:bg-gray-700 dark:text-gray-300', isDark)

        };



        // Initialize Summernote with toolbar and options
        $textarea.summernote({
            height: options.height ?? 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            callbacks: {
                onDrop: function(e) {
                    e.preventDefault();
                },
                onImageUpload: function(files) {

                },

            },
            placeholder: 'Enter content here...'
        });

        // Apply theme after initializing Summernote
        applyTheme();

        // Observe changes in the `class` attribute of `<html>` to detect dark mode toggle
        const observer = new MutationObserver(() => applyTheme());
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });


    });
}
