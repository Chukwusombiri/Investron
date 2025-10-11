import Footer from '@/Components/Footer';
import NavBar from '@/Components/NavBar';
import GeneralContextProvider from '@/Contexts/GeneralContext';


export default function GeneralLayout({ children }) {
    return (
        <GeneralContextProvider>
            <div className="frank-regular min-h-screen bg-gray-100">
                <NavBar />
                <main>{children}</main>
                <Footer />
            </div>
        </GeneralContextProvider>
    );
}
