import ApplicationLogo from '@/Components/ApplicationLogo';
import CTA from '@/Components/CTA';
import Footer from '@/Components/Footer';
import IntroCard from '@/Components/IntroCard';
import NavBar from '@/Components/NavBar';
import SecondaryLinkButton from '@/Components/SecondaryLinkButton';
import GeneralContextProvider from '@/Contexts/GeneralContext';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    const bgStyle = {
        backgroundImage: `url('/images/guest-bg.jpg')`,
        backgroundSize: "cover",
        backgroundRepeat: "no-repeat",
        backgroundPosition: "center center"
    }
    return (
        <GeneralContextProvider>
            <div className="frank-regular min-h-screen bg-gray-100">
                <NavBar />
                <main>
                    <IntroCard image='client-portal-hero.jpg' heading={'Client Portal'} />
                    <div className="relative flex h-screen flex-col items-center justify-center sm:py-10 bg-primary-500" style={bgStyle}>
                        <div className="m-6 md:w-full h-auto md:h-max-content overflow-hidden bg-primary-50 px-6 py-4 shadow-md sm:max-w-md rounded-lg flex flex-col justify-center">                           
                            {children}
                        </div>
                    </div>
                    <CTA>
                        <h2 className='text-3xl md:text-4xl lg:text-5xl capitolium text-center'>Continue your journey</h2>
                        <div className="w-full flex justify-center">
                            <SecondaryLinkButton to={'/contact-us'} classes='text-primary-50 bg-primary-500 hover:bg-opacity-90 shadow'>
                                speak to a partner
                            </SecondaryLinkButton>
                        </div>
                    </CTA>
                </main>
                <Footer />
            </div>
        </GeneralContextProvider>
    );
}
