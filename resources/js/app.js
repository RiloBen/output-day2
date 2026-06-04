const menuButton = document.getElementById('menu-button');
const aside = document.getElementById('aside');

if (menuButton && aside) {
    menuButton.addEventListener('click', () => {
        aside.classList.toggle('hidden');
    });
}

// Theme manager: toggle dark mode and persist to localStorage
const themeToggle = document.getElementById('theme-toggle');

function applyTheme(theme) {
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
}

function updateToggleIcon(isDark) {
    if (!themeToggle) return;
    themeToggle.innerHTML = isDark
        ? `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />
        </svg>
        `
        : `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
        </svg>
        `;
}

// Initialize theme from localStorage or system preference
(function initTheme() {
    try {
        const saved = localStorage.getItem('theme');
        if (saved === 'dark' || saved === 'light') {
            applyTheme(saved);
            updateToggleIcon(saved === 'dark');
            return;
        }

        // No saved preference: follow system
        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        applyTheme(prefersDark ? 'dark' : 'light');
        updateToggleIcon(prefersDark);
    } catch (e) {
        // ignore
    }
})();

if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        const isDark = document.documentElement.classList.toggle('dark');
        try {
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        } catch (e) {}
        updateToggleIcon(isDark);
    });
}

// If the user hasn't set a preference, respond to system changes
if (window.matchMedia) {
    const mq = window.matchMedia('(prefers-color-scheme: dark)');
    const listener = (e) => {
        if (!localStorage.getItem('theme')) {
            applyTheme(e.matches ? 'dark' : 'light');
            updateToggleIcon(e.matches);
        }
    };
    if (mq.addEventListener) {
        mq.addEventListener('change', listener);
    } else if (mq.addListener) {
        mq.addListener(listener);
    }
}
