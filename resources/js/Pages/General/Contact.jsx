import ContactForm from '@/Components/ContactForm'
import LocationCard from '@/Components/LocationCard'
import Subtext from '@/Components/Subtext'
import Video from '@/Components/Video'
import { useForm } from '@inertiajs/react'
import React from 'react'

function Contact({ advisor }) {
    const [hasSubmitted, setHasSubmitted] = React.useState(false);
    return (
        <div className='bg-primary-500 text-primary-50'>
            {/* hero */}
            <section className='relative min-h-screen mb-12'>
                <div className="mx-auto max-w-5xl pt-40 md:pt-48 pb-12 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-6">
                    <div className={`w-full px-6 ${hasSubmitted ? 'lg:px-8 bg-primary-500 relative z-20' : 'lg:px-0'}`}>
                        <Subtext>CONTACT US</Subtext>
                        <h1 className='h1 mb-4'>Get in touch</h1>
                        <p className="p1">Speak to one of our 240+ partners to discover how we can help you.</p>
                    </div>
                    <div className='mx-0 md:mx-8 lg:mx-0 relative z-20 bg-[#12232a]'>
                        <div className="w-full px-6" id='contact-form'>
                            {
                                hasSubmitted ? (
                                    <div className='flex flex-col items-center justify-center gap-6 h-96'>
                                        <h2 className='capitolium text-3xl md:text-4xl lg:text-5xl text-center'>Thank you for reaching out!</h2>
                                        <p className='text-md'>
                                            Our team will get in touch with you shortly through the email address you provided. If you unintentionally 
                                            entered an invalid email, do well to refresh page and fill form again using correct details and submit.
                                        </p>
                                    </div>
                                ) : <ContactForm advisor={advisor} setHasSubmitted={setHasSubmitted} />
                            }
                        </div>
                    </div>
                </div>
                <div className="hidden md:block absolute top-[60%] w-full h-[55vh] z-10">
                    <Video video={{
                        src: '/videos/Contact-Us-New-Video.mp4',
                        fallback: ''
                    }} />
                </div>
            </section>
            {/* offices */}
            <section className="min-h-screen pt-16 lg:pt-32">
                <div className="flex flex-col gap-12">
                    {/* section heading */}
                    <div className="flex flex-col items-center gap-4 px-8">
                        <div className="flex justify-center">
                            <Subtext>our locations</Subtext>
                        </div>
                        <h5 className="h2 text-center">Multiple locations to serve your needs</h5>
                        <p className="p2 text-center">We have offices throughout the United States.</p>
                    </div>
                    {/* location image card */}
                    <LocationCard />
                </div>
            </section>
        </div>
    )
}

export default Contact