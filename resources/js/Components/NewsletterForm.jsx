import { Link, useForm, usePage } from '@inertiajs/react';
import React, { useLayoutEffect, useState } from 'react'
import PrimaryButton from './PrimaryButton';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import GGLikeInput from './GGLikeInput';
import { ImSpinner9 } from "react-icons/im";
import Checkbox from './Checkbox';
import InputLabel from './InputLabel';


function NewsletterForm({ result }) {
    const { appName } = usePage().props;
    const [isSubscribed, setIsSubscribe] = useState(false);
    const [formDirty, setFormDirty] = useState({
        first_name: false,
        last_name: false,
        email: false,
        acceptedTerms: false,
    })

    const { data, setData, post, processing, errors, clearErrors, reset } = useForm({
        first_name: '',
        last_name: '',
        email: '',
        acceptedTerms: false,
    });

    const handleChange = (field, value) => {
        if (clearErrors(data[field])) clearErrors(data[field]);
        setFormDirty({ ...formDirty, [field]: true });
        setData(prev => ({ ...prev, [field]: value }));

    }

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/newletter-subscription', {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                setIsSubscribe(true);
                reset();
            },
        });
    }

    return (
        <div className='relative w-full min-h-[100vh]'>
            <video
                src='/videos/Home-Form.mp4'
                autoPlay
                muted
                loop
                playsInline
                preload="metadata"
                className="w-full h-screen object-cover"
            >
                Your browser does not support the video tag. Please upgrade your browser.
            </video>
            <div className="absolute inset-0 bg-gradient-to-r from-primary-500/90 to-primary-500/70 z-30 flex justify-center items-center">
                <div className="px-4 max-w-2xl py-12">
                    <div className="mb-4 lg:mb-8">
                        <h2 className="h2 text-primary-50 text-center">Learn more about {appName}</h2>
                        <p className='text-primary-50 p2 text-center mt-2 tracking-wider'>Discover how different wealth management can be with {appName}. Subscribe now.</p>
                    </div>
                    {
                        isSubscribed ? <div className="max-w-xl">
                            <p className="azo-sans text-2xl tacking-wide text-gray-100 text-center">
                                Congratulations! You are already subscribed to our Newsletter.
                            </p>
                        </div> : (
                            <form method='post' onSubmit={handleSubmit} className='w-full flex flex-col gap-8'>
                                <div className="relative grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <GGLikeInput title="First Name" val={data.first_name} onChange={handleChange} field='first_name' errors={errors} isTampered={formDirty.first_name} />
                                    <GGLikeInput title="Last Name" val={data.last_name} onChange={handleChange} field='last_name' errors={errors} isTampered={formDirty.last_name} />
                                </div>
                                <GGLikeInput title="Email" val={data.email} onChange={handleChange} field='email' type="email" errors={errors} isTampered={formDirty.email} />
                                <div>
                                    <div className="flex">
                                        <Checkbox
                                            id="acceptedTerms"
                                            type="checkbox"
                                            className="border border-primary-50 checked:bg-primary-100 checked:text-primary-500 focus:bg-primary-100"
                                            checked={data.acceptedTerms}
                                            onChangeFunc={(evt) => handleChange(evt.target.id, evt.target.checked)}
                                            required
                                        />
                                        <InputLabel     
                                            htmlFor="acceptedTerms" 
                                            custom='ml-4'
                                        >
                                            Yes, I would like to receive information about {appName} and have read and agree to {appName}'s <Link href="/privacy-policy" className='underline'>Privacy Policy</Link> and <Link href='/terms-of-use' className='underline'>Terms of Use.</Link>
                                        </InputLabel>                                       
                                    </div>
                                    {
                                        errors.acceptedTerms && <p className='text-pink-600 text-xs tracking-wide mt-2'>{errors.acceptedTerms}</p>
                                    }
                                </div>

                                <div className='flex justify-center'>
                                    <PrimaryButton type="submit" disabled={processing}>
                                        {
                                            processing ? (<>
                                                <ImSpinner9 className='mr-2 animate-spin' /><span>Submitting...</span>
                                            </>) : 'Submit'
                                        }
                                    </PrimaryButton>
                                </div>
                            </form>
                        )
                    }
                    <div className="flex justify-center mt-4 md:mt-10">
                        <p className="text-xs azo-sans text-primary-50">This site is protected by reCAPTCHA and the Google <Link href="https://policies.google.com/privacy?hl=en-US" className='underline'>Privacy Policy</Link> and <Link href="https://policies.google.com/terms?hl=en-US" className='underline'>Terms of Service</Link> apply.</p>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default NewsletterForm