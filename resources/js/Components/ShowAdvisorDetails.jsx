import React, { useState } from 'react'
import { BsArrowLeft } from "react-icons/bs";
import SecondaryButton from './SecondaryButton';
import Modal from './Modal';
import ContactModal from './ContactModal';
import { SlClose } from "react-icons/sl";
export default function ShowAdvisorDetails({ advisor, setSelected }) {
    const [openModal, setOpenModal] = useState(false);
    const [hasSubmitted, setHasSubmitted] = useState(false);

    return (
        <div className='bg-white md:py-10 lg:py-16 '>
            <div className="w-full max-w-5xl mx-auto border-0 md:border border-gray-400">
                <div className="relative border-b border-gray-400 p-4 flex justify-center">
                    <h4 className="frank-bold p1 font-semibold">Advisor Details</h4>
                    <div onClick={() => setSelected(null)} className="absolute top-[50%] transform -translate-y-[50%] left-3 hover:bg-gray-300 rounded-full w-10 h-10 flex justify-center items-center">
                        <BsArrowLeft className='' />
                    </div>
                </div>
                <div className="p-6 md:p-10">
                    <div className="relative flex gap-6 items-center flex-wrap pb-8 md:pb-12 border-b border-gray-400">
                        <div className="relative overflow-hidden w-16 h-16 md:h-44 md:w-44" style={{
                            backgroundImage: 'url(/images/advisors/advisor-bg.jpg)',
                            backgroundSize: 'cover',
                            backgroundRepeat: 'no-repeat'
                        }}>
                            <img
                                src={`/images/advisors/${advisor.image}`}
                                alt={advisor.name}
                                className="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110"
                            />
                        </div>

                        <div className="flex flex-col justify-center">
                            <p className="text-[22px] md:text-[36px] capitolium text-primary-500 font-bold">{advisor.name}</p>
                            <p className="p1 text-gray-600 frank-bold">{advisor.title}</p>
                        </div>
                        <span className="absolute left-0 -bottom-3 bg-primary-50 text-primary-500 frank-bold p2 p-1.5">Biography</span>
                    </div>
                    <div className="pt-5 md:pt-10">
                        <p className="p2 text-primary-400 pb-4 md:pb-8 text-wrap">
                            {advisor.bio}
                        </p>
                        <div className="flex justify-center">
                            <SecondaryButton onClick={() => setOpenModal(true)} className='bg-primary-500 text-white hover:bg-gray-700 hover:text-white px-8 md:px-12 py-3 md:py-4'>
                                contact {(advisor.name).substring(0, advisor.name.indexOf(' '))}
                            </SecondaryButton>
                        </div>
                    </div>
                </div>
            </div>
            {
                openModal && (
                    <div
                        className="fixed inset-0 z-50 flex transform justify-center items-center overflow-y-hidden px-4 py-6 transition-all bg-primary-500/50"
                    >
                        {hasSubmitted ? <div className='flex flex-col justify-center items-center px-5 py-5 rounded-lg w-full max-w-5xl min-h-[35vh] max-h-[90vh] text-primary-500 bg-primary-50 overflow-y-scroll scrollbar scrollbar-thin scrollbar-thumb-rounded scrollbar-thumb-gray-500 scrollbar-track-transparent'>
                            <div className="flex justify-end">
                                <SlClose size={28} className='cursor-pointer' onClick={() => setOpenModal(false)} />
                            </div>
                            <h2 className="text-4xl text-primary-500 mb-3 capitolium">Thank you for reaching out!</h2>
                            <p className='text-sm text-gray-700'>Our team will get in touch with you shortly through the email address you provided. If you unintentionally
                                entered an invalid email, do well to refresh page and fill form again using correct details and submit.</p>
                        </div> : <div className='rounded-lg w-full max-w-5xl max-h-[90vh] text-primary-500 bg-primary-50 overflow-y-scroll scrollbar scrollbar-thin scrollbar-thumb-rounded scrollbar-thumb-gray-500 scrollbar-track-transparent'>
                            <ContactModal advisorName={advisor.name} onClose={() => setOpenModal(false)} setHasSubmitted={setHasSubmitted} />
                        </div>}
                    </div>
                )
            }
        </div>
    )
}
