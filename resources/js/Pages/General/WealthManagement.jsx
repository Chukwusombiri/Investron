import CTA from '@/Components/CTA';
import FeatureCard from '@/Components/FeatureCard';
import IntroCard from '@/Components/IntroCard'
import SecondaryLinkButton from '@/Components/SecondaryLinkButton';
import { useGeneralContext } from '@/Contexts/GeneralContext'
import { Head } from '@inertiajs/react'
import React from 'react'

export default function WealthManagement() {
  const { appName } = useGeneralContext();
  const feature = {
    id: 2,
    heading: 'Sophisticated services designed around you',
    description: 'We combine the personal service, creativity and objective advice of a boutique with the power of an exclusive partnership of experienced advisors, capabilities and unrivaled solutions to create a profoundly different wealth experience.',
    video: {
      src: '/videos/Sophisticated-Service.mp4',
      fallback: '/images/Sophisticated-services.jpg'
    },
    imageUrl: '/images/Sophisticated-service.png',
    button: {
      link: route('contact'),
      text: 'Speak to a partner'
    }
  }
  return (
    <div>
      <Head title={'Wealth Management | ' + appName} />
      <IntroCard heading={'Wealth Management'} video={{
        src: '/videos/Wealth-Management.mp4',
        fallback: '/images/Wealth-Management.jpg',
      }} />
      <div className='bg-primary-50 text-primary-500 py-12 lg:py-24'>
        {
          <FeatureCard key={feature.id} feature={feature} buttonClasses={'border border-primary-500 text-primary-500 bg-transparent hover:bg-primary-100'} />
        }
      </div>
      <div className="bg-primary-500 text-primary-50 py-20">
          <div className="w-full lg:max-w-5xl px-8 mx-auto flex flex-col gap-16">
            <h2 className="h2">Our wealth management services</h2>
            <div className="grid grid-cols-1 md:grid-cols-2 justify-center gap-7 lg:gap-10">
              <div className='flex flex-col gap-6'>
                <p className='text-lg tracking-wider azo-sans'>Holistic wealth management</p>
                <p className='p1'>Clients can benefit from comprehensive planning, holistic advice and coordinated strategies for their entire wealth picture—no matter how complex it may be. We can help advise you on everything from retirement, risk management and estate planning to philanthropy, insurance, tax management and saving for higher education.</p>
              </div>
              <div className='flex flex-col gap-6'>
                <p className='text-lg tracking-wider azo-sans'>Institutional investment management</p>
                <p className='p1'>Through our long-standing relationships, we can offer access to exclusive, custom-built traditional and alternative investments in both public and private markets. And through our size and scale, we are often able to secure preferred pricing that can result in reduced investment costs. As a result, {appName} clients can benefit from bespoke investment portfolios that help keep more of your assets working for you.</p>
              </div>
            </div>
          </div>
      </div>
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
