import { Link } from '@inertiajs/react';

export default function NavLink({
    active = false,
    className = '',
    children,
    ...props
}) {
    return (
        <Link
            {...props}
            className={
                'inline-flex items-center border-b-2 px-1 pt-1 text-md uppercase font-medium leading-5 transition duration-150 ease-in-out focus:outline-none ' +
                (active
                    ? 'visited:border-vibrant text-primary-50 focus:border-vibrant'
                    : 'border-transparent text-primary-100 hover:border-primary-200 hover:text-primary-200 focus:border-gray-200 focus:text-primary-200') +
                className
            }
        >
            {children}
        </Link>
    );
}
