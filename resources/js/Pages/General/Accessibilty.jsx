import IntroCard from '@/Components/IntroCard';
import { useGeneralContext } from '@/Contexts/GeneralContext'
import { Head, usePage } from '@inertiajs/react'
import React from 'react'

export default function Accessibilty() {
    const { appName, privacyMail } = usePage().props;

    return (
        <div>
            <Head title={'Accessibility | ' + appName} />
            <IntroCard image='Investron-Careers-Image-Hero.jpg.jpg' heading={'Accessibility Statement'} />
            <div className="px-6 py-12 flex">
                <div className="w-full max-w-5xl mx-auto text-gray-800 space-y-14">
                    <p className='p2'>{appName} Private Wealth LLC (“CPW”) is committed to making its website and the contents therein accessible and usable by all people, including persons with disabilities. We have undertaken efforts to comply with the World Wide Web Consortium’s Web Content Accessibility Guidelines 2.1, Levels A and AA (“WCAG-2.1”), and have engaged Monsido, Inc. to periodically conduct an accessibility audit of our website to ensure substantial compliance with WCAG-2.1 AA, any updates thereto, and other recommended guidelines and standards.</p>
                    <p className='p2'>In accordance with the Americans with Disabilities Act of 1990, applicable U.S. state and local laws, and international standards, we are committed to maximizing the accessibility of our website for our users, including those with disabilities. We assess the accessibility of our website from both an engineering and user-experience perspective on an ongoing basis, taking into account the use of assistive technology such as screen readers and screen magnifiers. It is our goal to constantly improve our website, keeping users with disabilities in mind.</p>
                    <p className='p2'>If you require any of the information available on this website in a different format or require assistance with a particular document or page, please contact us at: <a href={"mailto:"+privacyMail} className='underline'>{privacyMail}</a>.</p>
                </div>
            </div>
        </div>
    )
}
