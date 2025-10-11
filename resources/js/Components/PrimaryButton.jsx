export default function PrimaryButton({
    className = '',
    disabled,
    children,
    ...props
}) {
    return (
        <button
            {...props}
            className={
                `inline-flex items-center justify-center azo-sans uppercase px-8 py-3 md:px-12 md:py-3.5 rounded-full bg-primary-50 border-primary-50  hover:bg-opacity-80 uppercase tracking-widest text-md transition duration-150 ease-in-out${
                    disabled && 'opacity-25'
                } ` + className
            }
            disabled={disabled}
        >
            {children}
        </button>
    );
}
