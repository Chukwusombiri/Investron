import { useGeneralContext } from '@/Contexts/GeneralContext'
import React from 'react'
import ApplicationLogo from './ApplicationLogo';
import NavLink from './NavLink';
import { Link, usePage } from '@inertiajs/react';
import { FaLinkedinIn } from "react-icons/fa";

export default function Footer() {
    const { appName } = usePage().props;
    return (
        <footer className='bg-primary-500'>
            <div className="px-4 py-4 md:py-6 lg:py-12 max-w-5xl mx-auto">                
                <div className="my-6 grid grid-cols-1 lg:grid-cols-2 border-b border-primary-300 pb-6 md:pb-10 gap-8">
                    <div className='flex flex-col gap-4 md:gap-6'>
                        <ApplicationLogo className="capitolium uppercase tracking-wide text-2xl block w-auto text-primary-50" />
                        <p className="w-full md:w-[90%] text-gray-300 p2">
                            As fiduciaries, we put our clients first. We focus on exceeding expectations, simplifying lives, and helping establish lasting legacies.
                        </p>
                    </div>
                    <div className='grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-2 md:gap-4 justify-start'>
                        <ul className='space-y-2 md:space-y-4'>
                            <li><NavLink href='/about-us'><span className='p2 capitalize text-primary-50'>About us</span></NavLink></li>
                            <li><NavLink href="/careers"><span className='p2 capitalize text-primary-50'>Careers</span></NavLink></li>
                            <li><NavLink href="/contact-us"><span className='p2 capitalize text-primary-50'>Contact us</span></NavLink></li>
                        </ul>
                        <ul className='space-y-2 md:space-y-4'>
                            <li><NavLink href="/who-we-serve"><span className='p2 capitalize text-primary-50'>Who we SERVE</span></NavLink></li>
                            <li><NavLink href="/wealth-management"><span className='p2 capitalize text-primary-50'>Wealth Management</span></NavLink></li>
                            <li><NavLink href="/family-office-solutions"><span className='p2 capitalize text-primary-50'>Family Office Services</span></NavLink></li>
                        </ul>
                        <ul className='space-y-2 md:space-y-4'>
                            <li><NavLink href="/contact-us"><span className='p2 capitalize text-primary-50'>Contact us</span></NavLink></li>
                            <li><NavLink href="/find-an-advisor"><span className='p2 capitalize text-primary-50'>Advisors</span></NavLink></li>
                            <li><NavLink href="/insights/articles"><span className='p2 capitalize text-primary-50'>Insights</span></NavLink></li>
                        </ul>
                    </div>
                </div>
                <div className="py-6 pb-10 border-b border-primary-300">
                    <div className="flex flex-wrap items-center text-primary-50 gap-y-4">
                        <Link href="/disclosure" className="p2 underline border-r px-2 md:px-4">Disclosure</Link>
                        <Link href="/terms-of-use" className="p2 underline border-r px-2 md:px-4">Terms of use </Link>
                        <Link href="/privacy-policy" className="p2 underline border-r px-2 md:px-4">Privacy policy</Link>
                        <Link href="/accessibility" className="p2 underline border-r px-2 md:px-4">Accessibility</Link>
                        <Link href="/client-relationship" className="p2 underline px-2 md:px-4">Client Relationship Summary & Firm Disclosure Brochures</Link>
                    </div>
                </div>
                <div className="flex justify-between flex-wrap pt-6 md:pt-10 gap-6">
                    <p className='p2 text-primary-50 order-2 md:order-1'>© {new Date().getFullYear()} {appName} Private Wealth LLC. All rights reserved.</p>                   
                </div>
            </div>
        </footer>
    )
}
