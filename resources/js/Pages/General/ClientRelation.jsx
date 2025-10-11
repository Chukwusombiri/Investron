import IntroCard from '@/Components/IntroCard';
import { useGeneralContext } from '@/Contexts/GeneralContext'
import { Head, Link } from '@inertiajs/react'
import React from 'react'
import { BsDashLg } from "react-icons/bs";

export default function ClientRelation() {
    const { appName } = useGeneralContext();
    return (
        <div>
            <Head title={'Disclosure Brochures | ' + appName} />
            <IntroCard image='Investron-Careers-Image-Hero.jpg.jpg' heading={ appName+' and Affiliates Disclosure Brochures'} />
            <div className="px-6 py-12 flex">
                <div className="w-full max-w-5xl mx-auto text-gray-800 text-md space-y-14">
                    <p>To learn more about {appName} and each of our affiliates including our relationship with clients and the services we provide see the disclosure documents related to each entity below.</p>
                    <div className="flex flex-col gap-3">
                        <h2 className="h2 font-semibold">Investron Private Wealth, LLC</h2>
                        {/* <p className='flex items-center'>Client Relationship Summary <BsDashLg className='mx-2'/> <a href="/download/client-relationship-summary?doc=sum" className='font-semibold underline hover:no-underline'>Download</a></p>
                        <p className='flex items-center'>Form ADV Part 2A <BsDashLg className='mx-2'/> <a href="/download/client-relationship-summary?doc=private" className='font-semibold underline hover:no-underline'>Download</a></p> */}
                        <p className='flex items-center'>Client Relationship Summary <BsDashLg className='mx-2'/> <a href="/INVESTRON-CLIENT-RELATIONSHIP-SUMMARY.pdf" target='_blank' className='font-semibold underline hover:no-underline'>Download</a></p>
                        <p className='flex items-center'>Form ADV Part 2A <BsDashLg className='mx-2'/> <a href="/INVESTRON-Private-LLC-Form-ADV.pdf" target='_blank' className='font-semibold underline hover:no-underline'>Download</a></p>
                    </div>
                    <div className="flex flex-col gap-3">
                        <h2 className="h2 font-semibold">Investron IA, LLC</h2>                        
                        {/* <p className='flex items-center'>Form ADV Part 2A <BsDashLg className='mx-2'/> <a href="/download/client-relationship-summary?doc=IA" className='font-semibold underline hover:no-underline'>Download</a></p> */}
                        <p className='flex items-center'>Form ADV Part 2A <BsDashLg className='mx-2'/> <a href="/INVESTRON-IA-LLC-Form-ADV.pdf" target='_blank' className='font-semibold underline hover:no-underline'>Download</a></p>
                    </div>
                    <div className="flex flex-col gap-3">
                        <h2 className="h2 font-semibold">Affiliate Firm and Disclosure Brochure</h2>
                        <p className='break-words'>Cabana Asset Management <BsDashLg className='inline mx-2'/> <a href="https://adviserinfo.sec.gov/firm/summary/151418" className='font-semibold underline hover:no-underline'><span className="text-wrap break-words">https://adviserinfo.sec.gov/firm/summary/151418</span></a></p>
                        <p className='break-words'>Columbia Pacific Advisors, LLC <BsDashLg className='inline mx-2'/> <a href="https://adviserinfo.sec.gov/firm/summary/142725" className='font-semibold underline hover:no-underline'>https://adviserinfo.sec.gov/firm/summary/142725</a></p>
                        <p className='break-words'>GLASfunds, LLC <BsDashLg className='inline mx-2'/> <a href="https://adviserinfo.sec.gov/firm/summary/150884" className='font-semibold underline hover:no-underline'> https://adviserinfo.sec.gov/firm/summary/150884</a></p>
                        <p className='break-words'>OCM Capital Partners LLC  <BsDashLg className='inline mx-2'/> <a href="https://adviserinfo.sec.gov/firm/summary/114861" className='font-semibold underline hover:no-underline'>https://adviserinfo.sec.gov/firm/summary/114861</a></p>
                        <p className='break-words'>Segall Bryant & Hamill, LLC <BsDashLg className='inline mx-2'/> <a href="https://adviserinfo.sec.gov/firm/summary/106505" className='font-semibold underline hover:no-underline'>https://adviserinfo.sec.gov/firm/summary/106505</a></p>
                    </div>
                </div>
            </div>
        </div>
    )
}
