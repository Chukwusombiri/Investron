import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';
import GeneralLayout from './Layouts/GeneralLayout';
import AdminLayout from './Layouts/AdminLayout';
import AuthenticatedLayout from './Layouts/AuthenticatedLayout';
import GuestLayout from './Layouts/GuestLayout';
import GeneralContextProvider from './Contexts/GeneralContext';

const appName = import.meta.env.VITE_APP_NAME || 'Corient Partners';

createInertiaApp({
    title: (title) => `${title}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob('./Pages/**/*.jsx'),
        ).then((module) => {
            const page = module.default;
            // Extract the subdirectory from the component name
            const subdirectory = name.split('/')[0]; // e.g., 'General' or 'User'

            switch (subdirectory) {
                case 'User':
                case 'Profile':
                    page.layout = (page) => <AuthenticatedLayout>{page}</AuthenticatedLayout>
                    break;
                case 'Admin':
                    page.layout = (page) => <AdminLayout>{page}</AdminLayout>
                    break;
                case 'Auth':
                    page.layout = (page) => <GuestLayout>{page}</GuestLayout>
                    break;                
                case 'General':
                default:
                    page.layout = (page) => <GeneralLayout>{page}</GeneralLayout>
                    break;

            }
            
            return page;
        }),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(<App {...props} />);
    },
    progress: {
        color: '#4B5563',
    },
});
