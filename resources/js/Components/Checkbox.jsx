export default function Checkbox({ onChangeFunc, className = '', ...props }) {
    return (
        <input
            {...props}
            type="checkbox"
            className={
                'rounded size-6 bg-transparent shadow-sm focus:ring-transparent' +
                className
            }
        onChange={onChangeFunc}
        />
    );
}
