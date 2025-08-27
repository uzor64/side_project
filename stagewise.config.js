module.exports = {
    // Project configuration
    project: {
        name: "Laravel AGN Project",
        framework: "laravel",
        templateEngine: "blade",
        components: "livewire",
    },

    // Development server configuration
    devServer: {
        url: "http://agn.test",
        port: 80,
        host: "agn.test",
    },

    // File patterns to include/exclude
    include: [
        "resources/views/**/*.blade.php",
        "resources/css/**/*.css",
        "resources/js/**/*.js",
        "app/Livewire/**/*.php",
    ],

    exclude: [
        "node_modules/**",
        "vendor/**",
        "storage/**",
        "bootstrap/cache/**",
        "tests/**",
    ],

    // Framework-specific settings
    laravel: {
        bladeDirectives: true,
        livewireSupport: true,
        tailwindCSS: true,
    },

    // AI configuration
    ai: {
        context: {
            framework: "Laravel with Blade templates and Livewire components",
            styling: "Tailwind CSS",
            patterns: [
                "Uses Laravel Blade templating engine",
                "Livewire components for interactive features",
                "Tailwind CSS for styling",
                "Mobile-first responsive design",
                "Dark mode support",
            ],
        },
    },

    // Editor preferences
    editor: {
        formatOnSave: true,
        tabSize: 4,
        insertSpaces: true,
    },
};
