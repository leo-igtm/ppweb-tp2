import { useEffect } from 'react';

export default function Layout({ children, title }) {
    useEffect(() => {
        document.title = title ? `${title} - Arkham` : 'Arkham Inmobiliaria';
    }, [title]);

    return (
        <div>
            {children}
        </div>
    );
}
