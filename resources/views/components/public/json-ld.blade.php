
@if (!empty($generateData()))
    <script type="application/ld+json">
        {!! json_encode($generateData(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endif
