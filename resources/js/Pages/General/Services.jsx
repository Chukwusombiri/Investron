import React from 'react'
import { Head, Link } from '@inertiajs/react';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import Features from '@/Components/Features';
import CTA from '@/Components/CTA';
import SecondaryLinkButton from '@/Components/SecondaryLinkButton'
import IntroCard from '@/Components/IntroCard';

function Services() {
  const { appName } = useGeneralContext();
  const features = [
    {
      id: 1,
      heading: 'High achievers',
      description: 'We help wealthy individuals and families of all types who are looking to enjoy a full life, preserve their wealth for future generations, and provide for the people, causes and communities they care about.',
      video: {
        src: '/videos/High-Achievers-3.mp4',
        fallback: '/images/High-achievers.jpg'
      },
      imageUrl: '/images/High-Achievers-3.png',
      button: {
        link: route('contact'),
        text: 'Speak to a partner'
      }
    },
    {
      id: 2,
      heading: 'Entrepreneurs and founders',
      description: 'We assist CEO founders through liquidity planning for their next opportunity to every aspect of capital raises, sales, new transactions, exit strategies, capital gains and estate planning.',
      video: {
        src: '/videos/Entrepreneurs-and-Founders-3.mp4',
        fallback: '/images/Entrepreneurs-and-founders.jpg'
      },
      imageUrl: '/images/Entrepreneurs-and-Founders-3.png',
      button: {
        link: route('contact'),
        text: 'Speak to a partner'
      }
    },
    {
      id: 3,
      heading: 'Business owners',
      description: 'We help business owners unlock value and strategize for everything from sales to successions, wealth transfer and more.',
      video: {
        src: '/videos/Business-Owners-3.mp4',
        fallback: '/images/Business-owners-and-Start-your-journey.jpg'
      },
      imageUrl: '/images/Business-Owners-3.png',
      button: {
        link: route('contact'),
        text: 'Speak to a partner'
      }
    },
    {
      id: 4,
      heading: 'Professional athletes and entertainers',
      description: 'We help celebrated individuals transform current income into a lifetime of wealth and security. ',
      video: {
        src: '/videos/Professional-Athletes-and-Entertainers-3.mp4',
        fallback: '/images/Professional-athlets-and-entertainers.jpg'
      },
      imageUrl: '/images/Professional-Athletes-and-Entertainers-4.png',
      button: {
        link: route('contact'),
        text: 'Speak to a partner'
      }
    },
    {
      id: 5,
      heading: 'Corporate executives',
      description: 'We help executives who need to consider and manage restrictive assets, minimize taxes and plan for retirement.',
      video: {
        src: '/videos/Corporate-Executives-3.mp4',
        fallback: '/images/Corporate-executives.jpg'
      },
      imageUrl: '/images/Corporate-Executives-3.png',
      button: {
        link: route('contact'),
        text: 'Speak to a partner'
      }
    }

  ];
  return (
    <div>
      <Head title={'Who we serve | ' + appName} />
      <IntroCard image='who-we-serve.png' heading={'Who We Serve'} />
      <Features features={features} layoutClasses={'bg-primary-500 text-primary-50'} featureButtonClasses={'border border-primary-100 bg-primary-500 text-primary-50 hover:bg-primary-50 hover:text-primary-500'}/>
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

export default Services