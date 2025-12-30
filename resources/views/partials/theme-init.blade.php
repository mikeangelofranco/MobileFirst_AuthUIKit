<script>
    (() => {
        try {
            const stored = localStorage.getItem('theme');
            const prefersDark =
                window.matchMedia &&
                window.matchMedia('(prefers-color-scheme: dark)').matches;

            const shouldUseDark =
                stored === 'dark' || (!stored || stored === 'system') && prefersDark;

            document.documentElement.classList.toggle('dark', shouldUseDark);
        } catch (_) {
            // no-op
        }
    })();
</script>

