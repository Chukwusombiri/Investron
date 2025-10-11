import IntroCard from '@/Components/IntroCard';
import { useGeneralContext } from '@/Contexts/GeneralContext'
import { Head } from '@inertiajs/react'
import React from 'react'

export default function Disclosure() {
    const { appName } = useGeneralContext();
    return (
        <div>
            <Head title={'Disclosure | ' + appName} />
            <IntroCard image='Investron-Careers-Image-Hero.jpg.jpg' heading={'Disclosure'} />
            <div className="bg-primary-50 px-6">
                <div className="w-full max-w-5xl mx-auto space-y-4 py-12">
                    <p className="p1 frank-regular text-gray-800">This information is for educational purposes and is not intended to provide, and should not be relied upon for, accounting, legal, tax, insurance, or investment advice. This does not constitute an offer to provide any services, nor a solicitation to purchase securities. The contents are not intended to be advice tailored to any particular person or situation. We believe the information provided is accurate and reliable, but do not warrant it as to completeness or accuracy. This information may include opinions or forecasts, including investment strategies and economic and market conditions; however, there is no guarantee that such opinions or forecasts will prove to be correct, and they also may change without notice. We encourage you to speak with a qualified professional regarding your scenario and the then-current applicable laws and rules.</p>
                    <p className="p1 frank-regular text-gray-800">Different types of investments involve degrees of risk. The future performance of any investment or wealth management strategy, including those recommended by us, may not be profitable or suitable or prove successful. Past performance is not indicative of future results. One cannot invest directly in an index or benchmark, and those do not reflect the deduction of various fees that would diminish results. Any index or benchmark performance figures are for comparison purposes only, and client account holdings will not directly correspond to any such data.</p>
                    <p className="p1 frank-regular text-gray-800">Advisory services are offered through Investron Private Wealth LLC and its affiliates, each being a registered investment adviser (“RIA”) regulated by the U.S. Securities and Exchange Commission (“SEC”). The advisory services are only offered in jurisdictions where the RIA is appropriately registered. The use of the term “registered” does not imply any particular level of skill or training and does not imply any approval by the SEC. For a complete discussion of the scope of advisory services offered, fees, and other disclosures, please review the RIA’s Disclosure Brochure (Form ADV Part 2A) and Form CRS, available upon request from the RIA and online at <a href="https://adviserinfo.sec.gov/" className='underline hover:decoration-none'>https://adviserinfo.sec.gov/</a>. We also encourage you to review the RIA’s Privacy Policy and Code of Ethics, which are available upon request.</p>
                    <p className="p1 frank-regular text-gray-800">Our clients must, in writing, advise us of personal, financial, or investment objective changes and any restrictions desired on our services so that we may re-evaluate any previous recommendations and adjust our advisory services as needed. For current clients, please advise us immediately if you are not receiving monthly account statements from your custodian. We encourage you to compare your custodial statements to any information we provide to you.</p>
                </div>
            </div>
        </div>
    )
}
