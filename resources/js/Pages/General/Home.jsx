import CTA from '@/Components/CTA';
import Hero from '@/Components/Hero';
import NewsletterForm from '@/Components/NewsletterForm';
import SecondaryLinkButton from '@/Components/SecondaryLinkButton';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import { Head, usePage} from '@inertiajs/react';



export default function Home({ resp }) {
    const {appName} = usePage().props;
    return (
        <>
            <Head title={"Home | "+ appName} />
            <Hero />            
            <NewsletterForm result={resp}/>
            <CTA>
            <h2 className='cta-heading text-center'>Continue your journey</h2>
                <div className="w-full flex justify-center">
                    <SecondaryLinkButton to={'/contact-us'} classes='text-primary-50 bg-primary-500 hover:bg-opacity-90 shadow'>
                        speak to a partner
                    </SecondaryLinkButton>
                </div>
            </CTA>
            <div className="bg-primary-500 px-4">
                <div className="w-full max-w-5xl mx-auto pt-12">
                <p className="text-primary-100 p">{appName} manages $185 billion in client assets. All data as of September 30, 2024.  Client assets reflect the aggregate assets of {appName} Holdings Inc. (“Holdings”), {appName} Private Wealth LLC’s upstream US holding company.  Client assets include all of the assets in which Holdings has a majority or minority investment. Certain assets are not considered Regulatory Assets Under Management, as defined by the SEC and reported in {appName} Private Wealth LLC’s Form ADV.</p>
                </div>            
            </div>            
        </>
    );
}