// resources/js/theme.js
document.addEventListener('DOMContentLoaded', () => {

    const html = document.documentElement;

    // Apply saved theme on page load
    if (localStorage.theme === 'dark') {
        html.classList.add('dark');
    } else {
        html.classList.remove('dark');
    }


    // Update checkbox state for all toggles on page load
    document.querySelectorAll('[data-theme-toggle] input[type="checkbox"]').forEach(cb => {
        cb.checked = html.classList.contains('dark');
    });


    // Listen for clicks on any button with the "data-theme-toggle" attribute
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-theme-toggle]');
        if (!btn) return;

        html.classList.toggle('dark');
        localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';

        // Update checkbox state for all toggles when button clicked
        document.querySelectorAll('[data-theme-toggle] input[type="checkbox"]').forEach(cb => {
            cb.checked = html.classList.contains('dark');
        });
    });
});