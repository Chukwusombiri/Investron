import { motion, AnimatePresence } from 'framer-motion';
import ApplicationLogo from '@/Components/ApplicationLogo';
import HoverButton from '@/Components/HoverButton';
import NavLink from '@/Components/NavLink';
import { IoMdMenu, IoMdSearch } from "react-icons/io";
import { IoCloseSharp } from "react-icons/io5";
import { Link, usePage } from '@inertiajs/react';
import { useEffect, useRef, useState } from 'react';
import LinkButton from '@/Components/LinkButton';
import { useGeneralContext } from '@/Contexts/GeneralContext';

const parentVariants = {
    open: {
        x: 0,
        opacity: 1,
        transition: {
            duration: 0.5, // Duration for parent to slide in
            when: "beforeChildren", // Start child animations after parent finishes
        },
    },
    closed: {
        x: -300, // Slide out to the left
        opacity: 0,
        transition: {
            duration: 0.8, // Duration for parent to slide out
            when: "afterChildren", // Start parent slide out after children complete
        },
    },
};

const menuVariants = {
    open: {
        transition: {
            staggerChildren: 0.1,
            delayChildren: 0.2,
            staggerDirection: -1,
        },
    },
    closed: {
        transition: {
            staggerChildren: 0.1,
            staggerDirection: 1,
        },
    },
};

const itemVariants = {
    open: { x: 0, opacity: 1 },
    closed: { x: -50, opacity: 0 },
};

function NavBar() {
    const { auth } = usePage().props;
    const { isShowInsight } = usePage().props || null;
    const [isScrolled, setIsScrolled] = useState(false);
    const { menuOpen, setMenuOpen } = useGeneralContext();
    const navRef = useRef();
    const menuRef = useRef(null);

    useEffect(() => {
        function handleOutsideMenuClick(evt) {
            if (menuRef.current && !menuRef.current.contains(evt.target)) {
                setMenuOpen(false);
            }
        }

        document.addEventListener('mousedown', handleOutsideMenuClick);

        return () => {
            document.removeEventListener('mousedown', handleOutsideMenuClick);
        };
    }, []);

    useEffect(() => {
        const changeNavPosition = () => {
            setIsScrolled(window.scrollY > 1);
        };

        window.addEventListener('scroll', changeNavPosition);

        return () => {
            window.removeEventListener('scroll', changeNavPosition);
        };
    }, []);

    const menuItems = [
        { label: 'About', href: '/about-us' },
        { label: 'Who we serve', href: '/who-we-serve' },
        { label: 'Wealth Management', href: '/wealth-management' },
        { label: 'Family office solutions', href: '/family-office-solutions' },
        { label: 'Insight', href: route('insights') },
        { label: 'Careers', href: '/careers' },
        { label: 'Contact us', href: '/contact-us' },
    ];

    return (
        <nav
            ref={navRef}
            className={`fixed top-0 left-0 w-full z-40  transition duration-600 ease-in-out`}
        >
            <div
                className={`w-full px-6 md:px-0 ${isScrolled
                    ? menuOpen
                        ? 'bg-primary-500/80'
                        : 'backdrop-blur-sm bg-primary-500/80'
                    : (isShowInsight ? 'backdrop-blur-sm bg-primary-500/80' : 'bg-transparent')
                    }`}
            >
                <div
                    className={`border-b ${isScrolled
                        ? 'py-3 md:py-4 border-transparent'
                        : 'py-4 md:py-10 border-primary-100'
                        } max-w-5xl mx-auto`}
                >
                    <div className="flex md:justify-between items-center">
                        <div className="pr-2 md:pr-0">
                            <HoverButton
                                clicFunq={() => setMenuOpen(!menuOpen)}
                                classes="text-primary-50 hover:bg-primary-400 px-2  py-2"
                            >
                                <IoMdMenu size={20} />
                                <span className="hidden sm:inline ml-2">Menu</span>
                            </HoverButton>
                        </div>
                        <div className="mr-auto md:mr-0 flex justify-center">
                            <div className="flex shrink-0 items-center">
                                <Link href="/">
                                    <ApplicationLogo className="capitolium uppercase tracking-wider text-lg md:text-2xl block w-auto text-primary-50" />
                                </Link>
                            </div>
                        </div>

                        <Link
                            href={'/find-an-advisor'}
                            className="rounded-full inline-flex justify-center items-center border-2 border-transparent focus:border-vibrant px-2 py-2 text-primary-50 hover:bg-primary-400 capitalize text-xs md:text-sm tracking-wide transition-all duration-300 ease-in-out"
                        >
                            <IoMdSearch size={20} />
                            <span className="ml-2">
                                <span className="hidden sm:inline ">Find an</span>{' '}
                                advisor
                            </span>
                        </Link>
                    </div>
                </div>
            </div>

            <AnimatePresence>
                {menuOpen && (
                    <div
                        className="fixed inset-0 z-50"
                        style={{
                            backdropFilter: 'none',
                        }}
                    >
                        <div className="h-full w-full flex bg-primary-500/50">
                            <motion.div
                                ref={menuRef}
                                className="bg-primary-500 text-primary-50 h-full w-full max-w-md flex flex-col justify-between px-4 md:px-6 lg:px-10"
                                variants={parentVariants}
                                initial="closed"
                                animate="open"
                                exit="closed"
                            >
                                <motion.div
                                    variants={menuVariants} // Menu animation variants
                                    className="flex flex-col items-end gap-6"
                                >

                                    <div className="w-full border-b border-primary-300 py-4 flex justify-end">
                                        <button
                                            onClick={() => setMenuOpen(!menuOpen)}
                                            className="inline-flex justify-center items-center rounded-full w-12 h-12 border-2 border-vibrant bg-primary-400 hover:bg-primary-400/70"
                                        >
                                            <IoCloseSharp size={28} />
                                        </button>
                                    </div>
                                    {menuItems.map((item, index) => (
                                        <motion.div key={index} variants={itemVariants}>
                                            <NavLink active={route().current(item.label.toLowerCase())} href={item.href} className="text-xl">
                                                {item.label}
                                            </NavLink>
                                        </motion.div>
                                    ))}
                                    <motion.div variants={itemVariants}>
                                    <a href={auth.user ? '/dashboard' : '/login'} className={
                                        'inline-flex items-center border-b-2 px-1 pt-1 text-md uppercase font-medium leading-5 transition duration-150 ease-in-out focus:outline-none ' +
                                        (route().current() === 'user.dashboard' || route().current() === 'login'
                                            ? 'visited:border-vibrant text-primary-50 focus:border-vibrant'
                                            : 'border-transparent text-primary-100 hover:border-primary-200 hover:text-primary-200 focus:border-gray-200 focus:text-primary-200')
                                    }>{auth.user ? 'Portfolio' : 'Client Portal'}</a>
                                    </motion.div>
                                </motion.div>
                                <div className="border-t border-primary-300 py-2 md:py-4 flex justify-end">
                                    <LinkButton
                                        to="/find-an-advisor"
                                        classes="border-primary-50 bg-transparent text-primary-50 hover:bg-primary-50 hover:text-primary-500"
                                    >
                                        Find an advisor
                                    </LinkButton>
                                </div>
                            </motion.div>
                        </div>
                    </div>
                )}
            </AnimatePresence>
        </nav>
    );
}

export default NavBar;
