import CTA from '@/Components/CTA';
import Features from '@/Components/Features';
import IntroCard from '@/Components/IntroCard';
import PageFeatures from '@/Components/PageFeatures';
import SecondaryLinkButton from '@/Components/SecondaryLinkButton';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import { Head } from '@inertiajs/react'
import React from 'react'

function Careers() {
    const { appName } = useGeneralContext();
    const benefits = [
        {
            id: 1,
            heading: 'Professional development',
            description: 'Opportunities to attend annual conferences, maintain certifications and improve your job skills through coaching opportunities. We want you to feel empowered and confident in your work, and we\'re committed to investing in your growth and success.'
        },
        {
            id: 2,
            heading: 'Full life benefits',
            description: 'We also believe in supporting you in all aspects of your life. That\'s why we offer full life benefits, including a volunteer day to give back to the community and generous maternity and paternity leave to allow bonding time with your new addition.'
        },
        {
            id: 3,
            heading: 'Traditional benefits',
            description: 'Our 401(k) Plan includes a Safe Harbor Match Contribution, and our group health and welfare insurance plans provide medical, dental and vision coverage. We even offer short- and long-term disability and life and AD&D insurance to help protect you and your family.'
        },
        {
            id: 4,
            heading: 'Employee assistance',
            description: 'We also offer a Flexible Spending Account, Healthcare Savings Account and an Employee Assistance Program to support your well-being and financial planning needs. And to top it off, our Team Incentive Compensation Plan rewards greatness and recognizes your hard work and dedication.'
        },
    ]

    const values = [
        {
            id: 1,
            heading: 'Client focus',
            description: 'We are committed to putting our clients\' needs first and providing exceptional service and investment performance.'
        },
        {
            id: 2,
            heading: 'Integrity',
            description: 'We conduct ourselves with the highest ethical standards, honesty and transparency in all our interactions.'
        },
        {
            id: 3,
            heading: 'Collaboration',
            description: 'We believe that working together as a team and leveraging each other\'s strengths and diverse perspectives, leads to better outcomes for our clients and our firm.'
        },
        {
            id: 4,
            heading: 'Innovation',
            description: 'We embrace change and seek new and innovative ways to improve our services, processes and strategies.'
        },
        {
            id: 5,
            heading: 'Excellence',
            description: 'We strive for excellence in everything we do, setting high standards and holding ourselves accountable to achieve our goals.'
        },
        {
            id: 6,
            heading: 'Inclusivity',
            description: 'We believe that diversity and inclusivity are essential to our success as a firm, and we are committed to promoting a culture that values and respects differences.'
        },
    ];

    const features = [
        {
            id: 2,
            heading: 'Our people',
            description: 'A team of dedicated professionals committed to exceptional investment performance and client service. We foster a culture of collaboration, innovation and continuous learning to help our employees excel in their roles and achieve their career goals. ',
            video: {
                src: '/videos/Our-People.mp4',
                fallback: '/images/Our-people.jpg'
            },
            imageUrl: '/images/Our-People.png',
        },
        {
            id: 3,
            heading: 'Our investment professionals',
            description: 'Our investment professionals have a wealth of experience managing complex portfolios.',
            video: {
                src: '/videos/Our-Investment-Professionals.mp4',
                fallback: '/images/Our-investment-professionals.jpg'
            },
            imageUrl: '/images/Our-Investment-Professionals.png',
        },
        {
            id: 4,
            heading: 'Our business operations',
            description: 'Our business operations professionals ensure our operations run smoothly and efficiently. We promote a culture of diversity, inclusivity and collaboration and welcome talented professionals to join our team.',
            video: {
                src: '/videos/Our-Business-Operations.mp4',
                fallback: '/images/Our-business-operations.jpg'
            },
            imageUrl: '/images/Our-Business-Operations.png',
        },
    ];
    return (
        <div>
            <Head title={'Wealth Management | ' + appName} />
            <IntroCard heading={'Careers'} image='Investron-Careers-Image-Hero.jpg.jpg' />
            <div className="bg-gray-200 text-primary-500 py-16 lg:py-24 px-6">
                <div className="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 justify-center gap-8 md:gap-12 lg:gap-16">
                    <div>
                        <h2 className='cta-heading'>Find your next opportunity at {appName}</h2>
                    </div>
                    <div>
                        <p className="p2 leding-loose">
                            We are always looking for talented and motivated individuals to join our team. If you want to work for a company that values your contributions and supports your growth, we would like to meet you.
                        </p>
                    </div>
                </div>
            </div>
            <PageFeatures pageFeatures={values} layoutClasses={'md:grid-cols-2 lg:grid-cols-3'}>
                <h2 className='h2'>Why {appName}</h2>
                <p className="p2">Join a team that values your ambition and empowers your growth</p>
            </PageFeatures>
            <Features features={features} layoutClasses={'bg-primary-50 text-primary-500'} featureButtonClasses={'border border-primary-500 text-primary-500 bg-transparent hover:bg-primary-100'} />
            <PageFeatures pageFeatures={benefits} layoutClasses={'md:grid-cols-2'}>
                <h2 className='text-3xl md:text-4xl lg:text-5xl capitolium'>Our benefits</h2>
            </PageFeatures>
            <CTA>
                <h2 className='text-3xl md:text-4xl lg:text-5xl capitolium text-center'>Continue your journey</h2>
                <div className="w-full flex justify-center">
                    <SecondaryLinkButton to={'/contact-us#contact-form'} classes='text-primary-50 bg-primary-500 hover:bg-opacity-90 shadow'>
                        current openings
                    </SecondaryLinkButton>
                </div>
            </CTA>
        </div>
    )
}

export default Careers