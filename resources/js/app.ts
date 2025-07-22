import '../css/app.css';
import 'quill/dist/quill.snow.css';
// import '@coreui/coreui/dist/css/coreui.min.css'
// import 'flowbite/dist/flowbite.js';
import { initFlowbite } from 'flowbite';
import AOS from 'aos';
import 'aos/dist/aos.css';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import { initializeTheme } from './composables/useAppearance';
import { createHead } from '@vueuse/head'
import FloatingVue from 'floating-vue'
import 'floating-vue/dist/style.css';
// import ToastPlugin from 'vue-toast-notification';
// import 'vue-toast-notification/dist/theme-sugar.css'
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const head = createHead()
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(FloatingVue)
            .use(head)
            .mount(el);
        AOS.init({ once: true, duration: 500 })
        initFlowbite();
    },
    progress: {
        color: '#4B5563',
    },
});

// This will set light / dark mode on page load...
initializeTheme();
