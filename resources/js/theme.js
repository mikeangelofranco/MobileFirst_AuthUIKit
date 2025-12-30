function isDark() {
    return document.documentElement.classList.contains('dark');
}

function setTheme(theme) {
    const shouldBeDark = theme === 'dark';
    document.documentElement.classList.toggle('dark', shouldBeDark);
    localStorage.setItem('theme', theme);
}

function updateButtons() {
    const dark = isDark();
    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        button.setAttribute('aria-pressed', dark ? 'true' : 'false');
        button.setAttribute(
            'aria-label',
            dark ? 'Switch to light mode' : 'Switch to dark mode',
        );

        const label = button.querySelector('[data-theme-toggle-label]');
        if (label) label.textContent = dark ? 'Dark' : 'Light';
    });
}

export function initThemeToggle() {
    document.addEventListener('click', (event) => {
        const button = event.target.closest?.('[data-theme-toggle]');
        if (!button) return;

        setTheme(isDark() ? 'light' : 'dark');
        updateButtons();
    });

    updateButtons();
}

