import 'summernote/dist/summernote-lite.css';
import 'summernote/dist/summernote-lite';

export function initSummernote(selector = '#summernote', options = {}) {
    $(document).ready(function () {

        const $textarea = $(selector);

        const textareaClasses = $textarea.attr('class');

        const applyTheme = () => {
            const isDark = document.documentElement.classList.contains('dark');

            $textarea.next('.note-editor')
                .toggleClass('dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700', isDark)
                .toggleClass('text-gray-900 bg-white border-gray-300', !isDark);

            /*$textarea.next('.note-editor').find('.note-toolbar')
                .toggleClass('bg-gray-900 border-b border-gray-700', isDark)
                .toggleClass('bg-gray-100 border-b border-gray-300', !isDark);*/

            $textarea.next('.note-editor').find('.note-editing-area')
                .toggleClass('dark:bg-gray-700 dark:text-gray-300', isDark)
                .toggleClass('bg-white text-gray-900', !isDark);

            $textarea.next('.note-editor').find('.note-editable')
                .toggleClass('dark:bg-gray-700 dark:text-gray-300', isDark)
                .toggleClass('bg-white text-gray-900', !isDark)
                .addClass(textareaClasses);
        };

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
        });

        applyTheme();

        // Следим за сменой темы (если изменяется класс `dark` у `<html>`)
        const observer = new MutationObserver(() => applyTheme());
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });

        console.log("Summernote initialized with Tailwind + inherited classes");
    });
}
