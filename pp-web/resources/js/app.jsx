import './bootstrap';
import '../css/app.css';
import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/react';

const appName = import.meta.env.VITE_APP_NAME || 'Arkham';

const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true });

const resolvePageComponent = (name) => {
    const page = pages[`./Pages/${name}.jsx`];
    if (!page) throw new Error(`Page not found: ${name}`);
    return page.default;
};

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(name),
    setup({ el, App, props }) {
        const root = createRoot(el);
        root.render(<App {...props} />);
    },
    progress: {
        color: '#4B5563',
    },
});
