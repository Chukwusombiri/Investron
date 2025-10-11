import IntroCard from '@/Components/IntroCard';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import { Head } from '@inertiajs/react';
import React from 'react'

export default function Privacy() {
    const { appName } = useGeneralContext();
    return (
        <div>
            <Head title={'Privacy policy | ' + appName} />
            <IntroCard image='Investron-Careers-Image-Hero.jpg.jpg' heading={'Privacy Policy'} />
            <div className="bg-primary-50 px-6">
                <div className="w-full max-w-5xl mx-auto space-y-10 py-12 frank-regular text-gray-700">
                    <p className="p2 text-gray-700">Effective Date: <span className="font-medium">July 31, 2023</span></p>

                    <section className="mt-6">
                        <p className="mb-4 p2">
                            This Privacy Policy (“Policy”) describes how <span className="font-medium">Investron Private Wealth LLC</span> and its affiliate, subsidiary,
                            and related entities (collectively, “<span className="italic">Investron Private Wealth</span>,” “we,” “us,” or “our”) collect, use, disclose,
                            and retain personal information about individuals who interact with each website, mobile application, and other online platforms that
                            link to this Policy (collectively, the “Site”) and the services available through our Site (collectively, the “Services”).
                        </p>

                        <p className="mb-4 p2">
                            By accessing the Site or using any of our Services, you acknowledge and agree that your personal information will be handled
                            as described in this Policy. Your use of the Site and Services, and any dispute over privacy, is subject to this Policy and our
                            <a href={route('terms')} className="underline">Terms of Use</a>.
                        </p>

                        <p className='mt-4 p2'>
                            <span className="font-semibold text-primary-500 italic tracking-wider">Note to California Residents: </span> This Policy describes how we collect, use, disclose, sell, share, and retain your personal information, and your rights and choices over our processing of your personal information. For additional information relating to your rights and our processing of your personal information, please navigate to the <a href="#state-disclosure" className="underline"> Additional State Disclosures</a> section below.
                        </p>
                    </section>

                    <section className="mt-8">
                        <h2 className="p2 font-semibold mb-2">Table of Contents</h2>
                        <ul className="list-none text-gray-700">
                            <li className='text-wrap break-words word-wrap p2'><a href="#category" className='underline hover:no-underline'>Categories of Personal Information We Collect About You</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#personal-info" className='underline hover:no-underline'>How We Use Your Personal Information</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#disclose-information" className='underline hover:no-underline'>How We Disclose the Information We Collect</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#cookie" className='underline hover:no-underline'>Our Use of Cookies and Related Technologies</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#state-disclosure" className='underline hover:no-underline'>Additional State Disclosures</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#marketting-comm" className='underline hover:no-underline'>Marketing Communications</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#security" className='underline hover:no-underline'>Security Of My Information</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#third-party" className='underline hover:no-underline'>Third Party Links</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#children" className='underline hover:no-underline'>Children</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#contact-us" className='underline hover:no-underline'>Contact Us</a></li>
                            <li className='text-wrap break-words word-wrap p2'><a href="#policy" className='underline hover:no-underline'>Changes to This Policy</a></li>
                        </ul>
                    </section>

                    <section className="mt-8" id='category'>
                        <h2 className="h2 text-gray-800 mb-4">Categories of Personal Information We Collect About You</h2>
                        <p className="mb-4 p2">
                            Depending on your interaction with us, we may collect the following categories of personal information:
                        </p>
                        <ul className="list-disc text-gray-700 space-y-2 pl-5 lg:pl-10">
                            <li className='text-wrap break-words word-wrap p2'><strong>Identifiers,</strong> such as your name, email address, telephone number, mailing address, date of birth, social security number, driver’s license or state issued identification card number, passport or other government-issued identification card number, account login credentials, IP address, device identifier, unique online identifier, or similar identifiers.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Protected classifications, </strong> such as your age, gender, marital status, nationality, and country of origin.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Financial information,</strong> such as your estimated level of investible assets, financial account number, credit card number, debit card number, or other payment card information.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Commercial information,</strong> such as records of services and resources obtained or considered, feedback you may provide, and the contents of your communications with us.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Professional or employment-related information,</strong> such as your occupation, employment history, professional contact information, education history, or other information provided by you in connection with the Services or in the job application process.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Education information,</strong> such as where you attended school.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Audio, video, electronic or similar information,</strong> such as CCTV footage and photos captured in and around our offices.  </li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Internet or other electronic network activity,</strong> such as your browser type and operating system; browsing history, clickstream data, search history on the Site, and information regarding your interaction with an internet website, mobile application, email, newsletter, or advertisement, including access logs and other activity information related to your use of our Site; the length of time you visit our Site; and the referring URL, or the website or application that led you to our Site.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Geolocation data,</strong> such as the approximate physical location of your device or network connection.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Inferences,</strong> such as inferences drawn to create a profile reflecting your preferences, characteristics, psychological trends, predispositions, behavior, attitudes, intelligence, abilities, or aptitudes.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Sensitive personal information,</strong> as defined under applicable local law, such as social security number, driver’s license or state-issued identification card number, passport number, financial account information, credit card number, debit card number, or other payment card information, certain characteristics of protected classifications, and account login credentials and passwords.</li>
                        </ul>
                        <p className="mt-4 p2"><span className="underline">Information We Collect Directly From You.</span> We collect personal information directly from you when you use our Site or Services. If you register for an account, we may collect your name, login credentials, telephone number, postal address, and email address. If you contact us, we may collect information such as your name, email address, zip code, your estimated level of investible assets, your preferences (such as the Services that you may be interested in), the contents of a message or attachments that you may send to us, and other information you choose to provide. We may also collect information directly from you when you register for a webinar or other event. If you apply for employment with us, we may collect information from you in the online resume submission process.</p>
                        <p className="mt-4 p2"><span className="underline">Information We Collect Automatically.</span> We, and our third party business partners, automatically collect personal information when you use our Site using cookies, pixel tags, clear GIFs, and similar technologies. This may include information such as your IP address and the types of personal information described above as “Internet or other electronic network activity.” For additional information, please review our section below on “Our Use of Cookies and Related Technologies.” </p>
                    </section>

                    <section className="mt-8 p2" id='personal-info'>
                        <h2 className="h2 text-gray-800">How We Use Your Personal Information</h2>
                        <p className="my-4">
                            We use each of the categories of your personal information described above for the following business purposes:
                        </p>
                        <ul className="list-disc list-inside text-gray-700 space-y-2">
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">To provide our Services and fulfill your requests.</span> We use your information to provide and maintain our Site and Services, to process and fulfill your requests, to communicate with you about your use of our Services, to respond to your inquiries, and for other customer service and business administration purposes.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">To improve our Site and Services.</span> We use your information to understand and analyze how you use our Site and Services, to improve and enhance the Site and Services, and to develop new services, electronic offerings, features, and functionality.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">Identity and authentication purposes.</span> We use your information for identification and authentication purposes. For example, when you enter your account login credentials to enter one of our registration or login portals, we use your login ID and password to authenticate your identity.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">Personalization.</span> We use your information to tailor the content and information that we may send or display to you, to offer location customization, to provide personalized offers, personalized help and instructions, and to otherwise personalize your experiences while using the Site and Services.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">Marketing and promotional purposes.</span> We may use your information to send you news and newsletters, webinar and event updates, and to communicate with you about products, services, and special promotions offered by us or our third party business partners that may be of interest to you. We may also use your information to assist us in advertising our services on third-party websites and in other forums. To the extent you have consented to receive promotional text messages from us, we will not share that consent with third parties for purposes of allowing those third parties to send you text messages that are not on our behalf.  Message and data rates may apply.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">To comply with legal obligations.</span> We may use your information where we believe necessary to comply with our legal and regulatory obligations or to exercise or defend our rights or the rights of a third party, including complying with law enforcement or government authority requests and participating in compliance audits.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">To protect us and others.</span> We may use your information where we believe necessary to investigate, prevent, or take action regarding suspected or actual illegal activities, fraud, situations involving potential threats to the safety of any person or to otherwise enforce this Policy, our Terms of Use, or the integrity of our Site and Services.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">Deidentified data.</span> We may deidentify or anonymize your data in such a way that you may not reasonably be reidentified by us or another party, and we may use such deidentified data for any purpose permitted under applicable law. To the extent we deidentify data originally based on personal information, we will maintain and use such data in deidentified form and will not attempt to reidentify the data.</li>
                        </ul>
                    </section>
                    <div className="space-y-8 mt-8">
                        <h2 className="h2 text-gray-800" id='disclose-information'>How We Disclose the Information We Collect</h2>
                        <p>We may disclose each of the categories of your personal information described above for our business purposes as follows:</p>
                        <ul className="list-disc list-inside space-y-2">
                            <li className='text-wrap break-words word-wrap p2'><strong>Related entities.</strong> We may disclose the personal information we collect about you to our subsidiaries, affiliates, and related entities.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Service providers.</strong> We may disclose the personal information we collect about you to service providers, contractors, and agents who perform functions and business operations on our behalf, for the purposes set forth above. For example, we engage service providers to help us host and manage our events and webinars, verify your information, and with our advertising and marketing efforts.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Third parties.</strong> At your request, we may disclose your personal information to your financial advisor, your legal, accounting, and tax representatives, and to your financial institutions (including custodians and broker-dealers). We may also disclose the personal information we collect about you to our third party business partners, such as our advertising and analytics partners.</li>
                        </ul>
                        <p>We may also disclose your personal information in the following circumstances:</p>
                        <ul className="list-disc list-inside space-y-2">
                            <li className='text-wrap break-words word-wrap p2'><strong>Business Transfers.</strong> If (i) we or our affiliates are or may be acquired by, merged with, or invested in by another company, or (ii) if any of our assets are or may be transferred to another company, whether as part of a bankruptcy or insolvency proceeding or otherwise, we may transfer the information we have collected about you to the other company. As part of the business transfer process, we may disclose certain of your information to lenders, auditors, and third party advisors, including attorneys and consultants.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>In response to legal process.</strong> We may disclose your personal information where we believe necessary to comply with the law, a judicial proceeding, court order, or other legal process, such as in response to a court order or a subpoena.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>To protect us and others.</strong>  We disclose your personal information where we believe it is appropriate to do so to investigate, prevent, or take action regarding illegal activities, suspected fraud, situations involving potential threats to the safety of any person, violations of our Terms of Use or this Policy, or as evidence in litigation in which we are involved.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Aggregate and deidentified information.</strong>  We may disclose aggregate, anonymized, or deidentified information about you for any purpose permitted under applicable law.</li>
                            <li className='text-wrap break-words word-wrap p2'><strong>Consent.</strong>  We may disclose your personal information with your consent.</li>
                        </ul>
                        <h2 className="h2 text-gray-800" id='cookie'>Our Use of Cookies and Related Technologies</h2>
                        <p>We, and our third party advertising and analytics partners, use cookies and similar technologies to track information about your use of our Site and Services. We use this information to better understand, customize, and improve user experiences with the Site and Services, as well as for advertising purposes. We may combine this information with other personal information we collect about you (and our third party business partners may do so on our behalf).</p>
                        <ul className="list-disc list-inside space-y-2">
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">Cookies.</span> Cookies are small text files containing a string of alphanumeric characters. We may use both session and persistent cookies. A session cookie disappears after you close your browser. A persistent cookie remains after you close your browser and may be used by your browser on subsequent visits to our Site. Please review your browser’s “Help” file to learn the proper way to modify your cookie settings. Please note that if you delete or choose not to accept cookies from the Site, you may not be able to utilize the features of the Site to their fullest potential. To learn more about cookies, visit <a href="http://www.allaboutcookies.org" className='underline'>http://www.allaboutcookies.org</a>.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">Clear GIFs, pixel tags, and other technologies.</span> Clear GIFs are tiny graphics with a unique identifier, similar in function to cookies. In contrast to cookies, which are stored on your computer’s hard drive, clear GIFs are embedded invisibly on web and app pages. We may use clear GIFs (a.k.a. web beacons, web bugs, or pixel tags) to among other things, track the activities of Site visitors, help us manage content, and compile statistics about Site usage. A clear GIF can collect information such as: the IP address of the computer that downloaded the page on which the tag appears; the URL of the page on which the pixel tag appears; the time the page containing the pixel tag was viewed; the browser type and language; the device type; geographic location; and, the identification number of any cookie on the computer previously placed by that server. We and our third party business partners may also use clear GIFs in HTML emails to our customers, to help us track email response rates, identify when our emails are viewed, and track whether our emails are forwarded.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">Analytics.</span> We may use third-party analytics tools, such as Google Analytics, to help us understand user behavior on our Site. You can learn about Google’s practices by going to <a href="www.google.com/policies/privacy/partners/" className='underline'>www.google.com/policies/privacy/partners/</a>, and opt-out of them by downloading the Google Analytics opt-out browser add-on, available at <a href="https://tools.google.com/dlpage/gaoptout" className='underline'>https://tools.google.com/dlpage/gaoptout</a>.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">Interest-based advertising.</span> In certain instances, we may set tracking tools (e.g., cookies, clear GIFs) provided by third-party advertising partners to collect information regarding your activities on our Site (e.g., your IP address, page(s) visited, time of day) for advertising purposes. We may also share such information with third party advertising partners. These advertising partners may use this information (and similar information collected from other websites) for purposes of delivering targeted advertisements to you when you visit unaffiliated websites within their networks. This practice is commonly referred to as "interest-based advertising" or "online behavioral advertising." If you do not want interest-based advertising, you may be able to opt-out by visiting <a href="www.networkadvertising.org/managing/opt_out.asp" className='underline'>www.networkadvertising.org/managing/opt_out.asp</a> and <a href="www.aboutads.info/choices/" className='underline'>www.aboutads.info/choices/</a>.</li>
                            <li className='text-wrap break-words word-wrap p2'><span className="underline">Do Not Track (DNT).</span> Currently, our systems do not recognize browser “do-not-track” requests. You may, however, disable certain tracking as discussed in this section (e.g., by disabling cookies). You may also be able to opt-out of certain targeted advertising by following the instructions set forth in the “Interest-based advertising” section above.</li>
                        </ul>
                        <h2 className="h2 text-gray-800" id='state-disclosure'>Additional State Disclosures</h2>
                        <p>You may have certain rights regarding our processing of your personal information under applicable local law. If our processing of your personal information is governed by such laws, this section provides you with additional information regarding your rights and our processing of your personal information under applicable local law.</p>
                        <p>We may “sell” your personal information or “share” your personal information for cross-contextual behavioral advertising (as those terms are defined under applicable local law). We do not use and disclose your sensitive personal information for purposes other than permitted under applicable local law. Below is a chart that describes the categories of third parties to whom we may disclose, “sell,” or “share” for cross-contextual behavioral advertising, each category of your personal information for the business purposes described above.</p>
                        <div className="flex-auto">
                            <div className="w-full p-0 overflow-x-auto">
                                <table className='w-full table-auto border-collapse border border-slate-400'>
                                    <thead>
                                        <tr>
                                            <th className='border border-slate-300 frank-bold table-text text-primary-500 px-3 py-3.5 align-top text-start'>Category of personal information</th>
                                            <th className='border border-slate-300 frank-bold table-text text-primary-500 px-3 py-3.5 align-top text-start'>Categories of third parties to whom we may disclose personal information for a business purpose</th>
                                            <th className='border border-slate-300 frank-bold table-text text-primary-500 px-3 py-3.5 align-top text-start'>Categories of third parties to whom we may “sell” or “share” personal information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td className='border border-slate-300 frank-bold table-text px-3.5 py-4 align-top text-start'>Identifiers</td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                <ul className="list-disc space-y-2 pl-4 text-wrap">
                                                    <li className='text-wrap break-words word-wrap table-text'>Affiliates and subsidiaries</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Service providers</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Advertising networks</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Data analytics providers</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Professional advisors (such as lawyers, accountants, and consultants)</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Government authorities</li>
                                                </ul>
                                            </td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                <ul className="list-disc space-y-2 list-inside pl-2">
                                                    <li className='text-wrap break-words word-wrap table-text'>Advertising networks</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Data analytics providers</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className='border border-slate-300 frank-bold table-text px-3.5 py-4 align-top text-start'>Financial information</td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                <ul className="list-disc space-y-2 pl-4 text-wrap">
                                                    <li className='text-wrap break-words word-wrap table-text'>Affiliates and subsidiaries</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Service providers</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Professional advisors (such as lawyers, accountants, and consultants)</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Government authorities</li>
                                                </ul>
                                            </td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                Not applicable
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className='border border-slate-300 frank-bold table-text px-3.5 py-4 align-top text-start'>Internet or other electronic network activity</td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                <ul className="list-disc space-y-2 pl-4 text-wrap">
                                                    <li className='text-wrap break-words word-wrap table-text'>Affiliates and subsidiaries</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Service providers</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Advertising networks</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Data analytics providers</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Professional advisors (such as lawyers, accountants, and consultants)</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Government authorities</li>
                                                </ul>
                                            </td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                <ul className="list-disc space-y-2 list-inside pl-2">
                                                    <li className='text-wrap break-words word-wrap table-text'>Advertising networks</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Data analytics providers</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className='border border-slate-300 frank-bold table-text px-3.5 py-4 align-top text-start'>Geolocation data</td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                <ul className="list-disc space-y-2 pl-4 text-wrap">
                                                    <li className='text-wrap break-words word-wrap table-text'>Affiliates and subsidiaries</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Service providers</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Professional advisors (such as lawyers, accountants, and consultants)</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Government authorities</li>
                                                </ul>
                                            </td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>Not applicable</td>
                                        </tr>
                                        <tr>
                                            <td className='border border-slate-300 frank-bold table-text px-3.5 py-4 align-top text-start'>Inferences</td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                <ul className="list-disc space-y-2 pl-4 text-wrap">
                                                    <li className='text-wrap break-words word-wrap table-text'>Affiliates and subsidiaries</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Service providers</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Advertising networks</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Data analytics providers</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Professional advisors (such as lawyers, accountants, and consultants)</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Government authorities</li>
                                                </ul>
                                            </td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                <ul className="list-disc space-y-2 list-inside pl-2">
                                                    <li className='text-wrap break-words word-wrap table-text'>Advertising networks</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Data analytics providers</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className='border border-slate-300 frank-bold table-text px-3.5 py-4 align-top text-start'>Sensitive personal information</td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>
                                                <ul className="list-disc space-y-2 pl-4 text-wrap">
                                                    <li className='text-wrap break-words word-wrap table-text'>Affiliates and subsidiaries</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Service providers</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Professional advisors (such as lawyers, accountants, and consultants)</li>
                                                    <li className='text-wrap break-words word-wrap table-text'>Government authorities</li>
                                                </ul></td>
                                            <td className='border border-slate-300 table-text px-3.5 py-4 align-top text-start'>Not applicable</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h2 className="h2 text-gray-800 italic">Data Retention</h2>
                        <p>Your personal information will be held for only so long as it is necessary for the purposes for which it was originally collected, and in accordance with applicable local law. We will retain your personal information for the period necessary to fulfill the purposes outlined in this Policy. When assessing retention periods, we first examine whether it is necessary to retain the personal information collected and, if retention is required, work to retain the personal information for the shortest possible period permissible under applicable law.</p>
                        <h2 className="h2 text-gray-800 italic">Your Privacy Choices and Rights</h2>
                        <p>Depending on the jurisdiction in which you live, you may have the following rights under applicable local law:</p>
                        <ul className="list-disc pl-4 text-wrap space-y-2.5">
                            <li className='text-wrap break-words word-wrap p2'>Right to request access and a copy of your personal information and information relating to how it is processed;</li>
                            <li className='text-wrap break-words word-wrap p2'>Right to request deletion of your personal information;</li>
                            <li className='text-wrap break-words word-wrap p2'>Right to request the correction or update of the personal information we hold about you;</li>
                            <li className='text-wrap break-words word-wrap p2'>Right to opt-out of “sales” of your personal information and “sharing” of your personal information for cross-context behavioral advertising purposes (as these terms are defined under applicable law)</li>
                            <li className='text-wrap break-words word-wrap p2'>Right to opt-out of targeted advertising; </li>
                            <li className='text-wrap break-words word-wrap p2'>Right to limit our use of your sensitive personal information;</li>
                            <li className='text-wrap break-words word-wrap p2'>Right to opt-out of certain profiling activities;</li>
                            <li className='text-wrap break-words word-wrap p2'>Right to not be unlawfully discriminated against for exercising your rights.</li>
                        </ul>
                        <p>These rights may be limited or denied in some circumstances. For example, we may retain your personal information where required or permitted under applicable law.</p>
                        <h2 className="h2 text-gray-800 italic">Submitting Requests</h2>
                        <p>To exercise your rights under applicable local law, or if you are an authorized agent submitting a request on behalf of a consumer under applicable local law, you may contact us at <a href="mailto:privacy@example.com" className='underline'>privacy@example.com</a>. You or your authorized agent may be asked to provide information such as your name, email address, postal address, telephone number, or account number(s) (if available) to verify your identity. Authorized agents must also provide a copy of the consumer’s signed permission authorizing the agent to submit requests on the consumer’s behalf.</p>
                        <p>You may also opt-out of our “sale” or “sharing” of your personal information through privacy preference signals recognized under applicable local law, such as the Global Privacy Control (GPC), but please note that this signal will be linked to your browser only. GPC is not supported by all browsers. For additional information on the GPC and how to use browser and browser extension tools that incorporate the GPC signal, please see: <a href="https://globalprivacycontrol.org/" className='underline'>https://globalprivacycontrol.org/</a>. Additionally, you may contact us at <a href="mailto:privacy@example.com" className='underline'>privacy@example.com</a> to opt out of any sale or sharing of your personal information.</p>
                        <h2 className="h2 text-gray-800 italic">Appeals</h2>
                        <p>You may have a right to appeal a decision we make relating to requests to exercise your rights under applicable local law. To appeal a decision, please contact us at <a href="mailto:privacy@example.com" className='underline'>privacy@example.com</a>.</p>
                        <h2 className="h2 text-gray-800" id='marketting-comm'>Marketing Communications</h2>
                        <p>We may send periodic promotional emails to you. You may opt-out of promotional emails by following the opt-out instructions contained in the email. Please note that it may take up to 10 business days for us to process opt-out requests. If you opt-out of receiving promotional emails, we may still send you emails about your account or any services you have requested or received from us.</p>
                        <h2 className="h2 text-gray-800" id='security'>Security Of My Information</h2>
                        <p>We implement physical, technical, and organizational security measures designed to safeguard personal information. These measures are aimed to protect the personal information we collect from loss, misuse, and unauthorized access, disclosure, alteration, and destruction. Please be aware that despite our efforts, no data security measures can guarantee security.</p>
                        <h2 className="h2 text-gray-800" id='third-party'>Third Party Links</h2>
                        <p>Our Site and Services may contain links to third-party websites and applications. Any access to and use of such linked websites and applications is not governed by this Policy, but is instead governed by the privacy policies of those third-party websites and applications. We are not responsible for the information practices of such third-party websites and applications. We encourage you to review the privacy policies of any third-party websites and applications that you choose to visit.</p>
                        <h2 className="h2 text-gray-800" id='children'>Children</h2>
                        <p>Our Site and Services are not designed for children under the age of 13. If we discover that a child under the age of 13 has provided us with personal information, we will delete such information from our systems. We do not knowingly “sell” or “share” the personal information of children under the age of 16.</p>
                        <h2 className="h2 text-gray-800" id='contact-us'>Contact Us</h2>
                        <p>If you have questions or concerns about the privacy aspects of our Site or Services, or have a question about your rights under this Policy, please contact us at <a href="mailto:privacy@example.com" className='underline'>privacy@example.com</a>.</p>
                        <h2 className="h2 text-gray-800" id='policy'>Changes to This Policy</h2>
                        <p>This Policy is current as of the Effective Date set forth above. We may change this Policy from time to time, so please be sure to check back periodically. We will post any changes to this Policy on our Site. If we make any changes to this Policy that materially affect our practices with regard to the information we have previously collected about you, we will endeavor to provide you with notice in advance of such change by highlighting the change on our Site or sending you an email.</p>
                    </div>
                </div>
            </div>
        </div>
    )
}
