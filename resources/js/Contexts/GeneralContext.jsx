import { createContext, useContext, useState, useEffect } from "react";
import { usePage, router } from "@inertiajs/react";

const GeneralContext = createContext(null);

export const useGeneralContext = () => useContext(GeneralContext)

export default function GeneralContextProvider({ children }) {
    const {appName} = usePage().props;
    const [menuOpen, setMenuOpen] = useState(false);

    useEffect(() => {
        const handleMenuCloseOnNavigation = () => {
            setMenuOpen(false);
        }

        router.on('start',handleMenuCloseOnNavigation);   
        
    }, []);


    /* const { url } = usePage();
    useEffect(() => {
        let ignore = false;

        if(! ignore){
            setMenuOpen(false);
        }    
        
        return () => {
            ignore = true;
        }
    }, [url]); */

    return (
        <GeneralContext.Provider value={{ appName, menuOpen, setMenuOpen }}>
            {children}
        </GeneralContext.Provider>
    );
}