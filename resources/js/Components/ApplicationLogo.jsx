import { usePage } from "@inertiajs/react";

export default function ApplicationLogo(props) {    
    const { appName } = usePage().props;
    return (
        <p {...props}>Investron</p>
    );
}
