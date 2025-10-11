import AdvisorsCard from '@/Components/AdvisorsCard';
import CTA from '@/Components/CTA';
import IntroCard from '@/Components/IntroCard';
import SecondaryLinkButton from '@/Components/SecondaryLinkButton';
import { useGeneralContext } from '@/Contexts/GeneralContext'
import { Head } from '@inertiajs/react'
import React from 'react'

function Advisors({ advisors }) {
  const { appName } = useGeneralContext();
  return (
    <div>
      <Head title={`Advisors | ${appName}`} />
      <IntroCard heading={'Find an Advisor'} image='FindAnAdvisor-Hero.jpg'>
        <p className='text-primary-50 p2 mt-2 text-center w-full lg:max-w-4xl px-8'>Our unique partnership model fosters teamwork, professional collaboration, and a relentless focus on excellence. We have teams across the United States combining their knowledge and experience to serve your financial needs seamlessly.</p>
      </IntroCard>
      <AdvisorsCard advisors={advisors}/>

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

export default Advisors