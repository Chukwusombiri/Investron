import { Link } from '@inertiajs/react';
import React, { useEffect, useRef } from 'react'

export default function HoverButton({ children, clicFunq = null, classes = '' }) {
    const [isClicked, setIsClicked] = React.useState(false);
    const buttonRef = useRef(null);
    const borderClass = isClicked ? 'border-vibrant' : `border-transparent`;
    const allClasses = `rounded-full inline-flex justify-center items-center border-2 ${borderClass} ${classes} focus:border-vibrant capitalize text-sm tracking-wide transition-all duration-300 ease-in-out`
    function handleClick() {
        setIsClicked(true);
        clicFunq();
    }

    useEffect(() => {
        const handleClickOutside = (event) => {
            if (buttonRef.current && !buttonRef.current.contains(event.target)) {
                setIsClicked(false);
            }
        };
        document.addEventListener('mousedown', handleClickOutside);

        return () => {
            document.removeEventListener('mousedown', handleClickOutside);
        }
    }, []);

    return (

        <button ref={buttonRef}
            className={allClasses}
            onClick={handleClick}>
            {children}
        </button>
    )
}
