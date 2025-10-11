export default function InputLabel({
    value,
    custom = '',
    children,
    ...props
}) {
    return (
        <label
            {...props}
            className={
                `ml-2 block font-medium text-xs tracking-wider text-primary-50 text-wrap` +
                custom
            }
        >
            {value ? value : children}
        </label>
    );
}
