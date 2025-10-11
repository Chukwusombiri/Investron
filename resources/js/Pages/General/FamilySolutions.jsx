import CTA from '@/Components/CTA';
import FeatureCard from '@/Components/FeatureCard'
import IntroCard from '@/Components/IntroCard'
import PageFeatures from '@/Components/PageFeatures';
import SecondaryLinkButton from '@/Components/SecondaryLinkButton';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import { Head } from '@inertiajs/react';
import React from 'react'

function FamilySolutions() {
    const feature = {
        id: 2,
        heading: 'Enjoy a richer life',
        description: 'Our comprehensive family office solutions are designed to help you more fully enjoy your wealth—and your life.',
        video: {
            src: '/videos/Enjoy-a-richer-life.mp4',
            fallback: '/images/Richer-life.jpg'
        },
        imageUrl: '/images/Trust.jpg',
        button: {
            link: route('advisors'),
            text: 'Find an advisor',
        }
    }
    const { appName } = useGeneralContext();
    const solutions = [
        {
            id: 1,
            heading: 'Tax',
            description: 'Holistic tax planning and management to help reduce or eliminate the effects of taxes.'
        },
        {
            id: 2,
            heading: 'Trust',
            description: 'Enjoy simplicity, protection, duration and tax treatment through trust and trustee services.'
        },
        {
            id: 3,
            heading: 'Wealth transfer',
            description: 'Protect your loved ones, manage family dynamics and ensure values are passed on.'
        },
        {
            id: 4,
            heading: 'Values-aligned investing',
            description: 'Invest with impact through bespoke investment strategies aligned with your social, cultural, ethical, family and other values.'
        },
        {
            id: 5,
            heading: 'Personal CFO',
            description: 'Receive high-touch support for financial management, accounting, reporting and bill pay from a dedicated team of experienced professionals.'
        },
        {
            id: 6,
            heading: 'Concierge services',
            description: 'In some instances, we are able to leverage our relationships, scale and vast resources to provide distinct solutions to truly unique requests.'
        },
    ];
    return (
        <div>
            <Head title={'Family Office Solutions | ' + appName} />
            <IntroCard heading={'Family Office Solutions'} video={{
                src: '/videos/FamilyOfficeSolutions-Video-Hero.mp4',
                fallback: '/images/Family-Office-Solutions.jpg',
            }} />
            <div className='bg-primary-50 text-primary-500 py-12 lg:py-24'>
                {
                    <FeatureCard key={feature.id} feature={feature} isEven={true} buttonClasses={'border border-primary-500 text-primary-500 bg-transparent hover:bg-primary-100'} />
                }
            </div>
            <PageFeatures pageFeatures={solutions} layoutClasses={'md:grid-cols-2 lg:grid-cols-3'}>
                <h2 className='h2'>Our family office solutions</h2>
            </PageFeatures>
            <CTA>
                <h2 className='cta-heading text-center'>Continue your journey</h2>
                <div className="w-full flex justify-center">
                    <SecondaryLinkButton to={'/contact-us'} classes='text-primary-50 bg-primary-500 hover:bg-opacity-90 shadow'>
                        speak to a partner
                    </SecondaryLinkButton>
                </div>
            </CTA>
        </div>
    )
}

export default FamilySolutions