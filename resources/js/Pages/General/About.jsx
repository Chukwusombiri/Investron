import IntroCard from '@/Components/IntroCard';
import { IoPauseOutline } from "react-icons/io5";
import { IoMdPlay } from "react-icons/io";
import { useGeneralContext } from '@/Contexts/GeneralContext'
import { Head } from '@inertiajs/react'
import React, { useEffect, useRef, useState } from 'react'
import SecondaryLinkButton from '@/Components/SecondaryLinkButton';
import LinkButton from '@/Components/LinkButton';
import { GiPauseButton } from "react-icons/gi";

function About() {
    const { appName } = useGeneralContext();
    const [isPaused, SetIsPaused] = useState(false);
    const videoRef = useRef(null);
    useEffect(() => {
        if (videoRef.current) {
            if (isPaused) {
                videoRef.current.pause();
            } else {
                videoRef.current.play();
            }
        }
    }, [isPaused]);
    return (
        <div>
            <Head title={'About us | ' + appName} />
            <IntroCard video={{
                src: '/videos/About-Hero.mp4',
                fallback: '/images/About-Us.png',
            }} heading={'Welcome to ' + appName} />

            <div className="bg-primary-500 px-8 py-12">
                <h2 className="cta-heading text-center w-full max-w-5xl mx-auto text-primary-50">
                    We combine the service, creativity, and objective advice of a boutique with the power of experienced advisors, extensive capabilities, and custom-built strategies to create a differentiated wealth experience.
                </h2>
            </div>
            <div className="relative h-screen bg-center bg-cover">
                <video
                    ref={videoRef}
                    src={'/videos/About-Who-we-are.mp4'}
                    autoPlay
                    muted
                    loop
                    playsInline
                    preload="metadata"
                    className="w-full h-full object-cover"
                >
                    Your browser does not support the video tag. Please upgrade your browser.
                </video>
                <div className="absolute inset-0 z-30 bg-primary-500/40 py-12 md:py-16 px-8 flex justify-center items-center">
                    <div className="w-full max-w-5xl mx-auto backdrop-blur-md bg-primary-500/50 px-4 py-5 md:p-14 text-primary-50">
                        <div className="w-full mx-auto flex flex-col gap-4">
                            <h2 className="h2">
                                Who We Are
                            </h2>
                            <p className='text-[16px] md:text-[18px]'>
                                We are one of the largest integrated RIAs in the United States—with advisors across the country who have knowledge spanning the full spectrum of planning, investing, and money management disciplines. And, as fee-only fiduciaries, we are duty-bound to put you first.
                            </p>
                        </div>
                    </div>
                </div>
                <button onClick={() => SetIsPaused(!isPaused)} className="absolute bottom-2 right-2 md:bottom-10 md:right-10 border border-primary-50 rounded-full w-10 h-10 md:w-16 md:h-16 z-40 bg-transparent flex justify-center items-center">
                    {
                        isPaused ? <IoMdPlay className='text-primary-50 size-5' /> : <GiPauseButton className='text-primary-50 size-5' />
                    }
                </button>
            </div>

            <div className="h-[80vh] md:h-screen grid grid-cols-1 lg:grid-cols-2 bg-primary-500">
                <div className="flex justify-center items-center p-4 md:p-8 lg:p-24">
                    <div className="flex flex-col gap-7 md:gap-4">
                        <h2 className="h2 text-gray-200">
                            What we do
                        </h2>
                        <p className='text-gray-300 text-[16px] md:text-[18px]'>
                            We have experience navigating the complexities that come with extensive assets and the challenges that may get in the way of success. We work collaboratively, putting the power of our collective knowledge and resources into creating the best possible experience for clients.
                        </p>
                        <div className="w-full flex mt-3">
                            <SecondaryLinkButton to={'/wealth-management'} classes='text-primary-50 border border-primary-50 py-4 hover:bg-primary-50 hover:text-primary-500'>
                                Discover our solutions
                            </SecondaryLinkButton>
                        </div>
                    </div>
                </div>
                <div className="h-full hidden lg:flex justify-center items-center">
                    <img src="/images/About-What-we-do.jpg" alt="About-What-we-do.jpg" className='w-full h-screen object-cover' />
                </div>
            </div>

            <div className="bg-gradient-to-b from-primary-400 to-primary-500 px-8 py-12 md:py-24 flex flex-col justify-center items-center">
                <p className='p mb-4 text-primary-200'>Continue Your Journey</p>
                <h4 className='cta-heading text-primary-50 mb-6'>Speak to a Partner</h4>
                <LinkButton to={'/contact-us'}>Contact Us</LinkButton>
            </div>
        </div>
    )
}

export default About