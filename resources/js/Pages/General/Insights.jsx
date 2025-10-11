import Articles from '@/Components/Articles';
import CTA from '@/Components/CTA';
import IntroCard from '@/Components/IntroCard';
import SecondaryLinkButton from '@/Components/SecondaryLinkButton';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import { Head } from '@inertiajs/react';
import React from 'react'

export default function Insights({ articles }) {
    const { appName } = useGeneralContext();
    return (
        <div>
            <Head title={'Insights | ' + appName} />
            <IntroCard heading={'Insights'} image='Insights-Hero.jpg'>
                <p className='text-primary-50 p1 mt-2'>The latest insight and updates from {appName} thought leaders.</p>
            </IntroCard>
            <Articles articlesArr={articles} />
            <CTA bgColor='bg-primary-200'>
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

