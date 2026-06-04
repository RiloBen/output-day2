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
    // simple sun / moon icons
    themeToggle.innerHTML = isDark
        ? `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
        </svg>
        `
        : `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.66-11.34l-.7.7M4.04 19.96l-.7.7M21 12h-1M4 12H3m15.66 5.66l-.7-.7M4.04 4.04l-.7-.7M12 5a7 7 0 100 14 7 7 0 000-14z" />
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
