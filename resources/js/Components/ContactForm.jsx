import React, { useState } from 'react'
import { optionsResource } from '@/utils/utilities';
import { ImSpinner9 } from "react-icons/im";
import { Link, useForm } from '@inertiajs/react';
import GGLikeInput from './GGLikeInput';
import PrimaryButton from './PrimaryButton';
import SelectList from './SelectList';
import TextArea from './TextArea';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import CheckboxFull from './CheckboxFull';


export default function ContactForm({advisor=null,setHasSubmitted}) {
    const { appName } = useGeneralContext()    
    const { data, setData, reset, processing, post, errors, clearErrors } = useForm({
        first_name: '',
        last_name: '',
        email: '',
        phone: '',
        zipcode: '',
        asset: '',
        demand: '',
        comment: '',
        acceptedTerms: false,
        acceptedNewsLetter: false,
        acceptedPartner: false,
        advisor: advisor
    });

    const [formDirty, setFormDirty] = useState({
        first_name: false,
        last_name: false,
        email: false,
        phone: false,
        zipcode: false,
        comment: false,
    })

    const handleChange = (field, value) => {
        if (clearErrors(data[field])) clearErrors(data[field]);
        setFormDirty({ ...formDirty, [field]: true });
        setData(prev => ({ ...prev, [field]: value }));

    }

    const handleFormSubmit = (e) => {
        e.preventDefault();
       
        post('/contact-us', {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                setHasSubmitted(true);
                reset();
            },
        });
    }
    return (
        <>
            <form onSubmit={handleFormSubmit} method='post' className='w-full flex flex-col gap-8 mt-10'>
                <div className="relative grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <GGLikeInput title="First Name" val={data.first_name} onChange={handleChange} field='first_name' errors={errors} isTampered={formDirty.first_name} />
                    <GGLikeInput title="Last Name" val={data.last_name} onChange={handleChange} field='last_name' errors={errors} isTampered={formDirty.last_name} />
                    <GGLikeInput title="Email" val={data.email} onChange={handleChange} field='email' type="email" errors={errors} isTampered={formDirty.email} />
                    <GGLikeInput title="Phone" val={data.phone} onChange={handleChange} field='phone' errors={errors} isTampered={formDirty.phone} />
                    <GGLikeInput title="Zipcode" val={data.zipcode} onChange={handleChange} field='zipcode' errors={errors} isTampered={formDirty.zipcode} />
                    <SelectList title="Investable assets?" val={data.asset} onChange={handleChange} field='asset' errors={errors} isTampered={formDirty.asset} options={optionsResource.assetOptions} />
                    <SelectList
                        title="What can we help you with?"
                        val={data.demand}
                        onChange={handleChange}
                        field='demand'
                        errors={errors}
                        isTampered={formDirty.demand}
                        options={optionsResource.demandOptions}
                        classProps='lg:col-span-2' />
                    <TextArea
                        title="Additional comment"
                        val={data.comment}
                        handleChangeFunc={handleChange}
                        field='comment'
                        errors={errors}
                        isTampered={formDirty.comment}
                        classProps='lg:col-span-2'
                    />
                    <CheckboxFull field={'acceptedTerms'} val={data.acceptedTerms} classProps='lg:col-span-2' checkFunc={(evt) => handleChange(evt.target.id, evt.target.checked)} errors={errors}>
                        I have read and agree to {appName}’s <Link href="/privacy-policy" className='underline'>Privacy Policy</Link> and <Link href='/terms-of-use' className='underline'>Terms of Use.</Link>
                    </CheckboxFull>
                    <CheckboxFull field={'acceptedNewsLetter'} val={data.acceptedNewsLetter} classProps='lg:col-span-2' checkFunc={(evt) => handleChange(evt.target.id, evt.target.checked)} errors={errors}>
                        By checking this box, I agree to receive promotional text messages from {appName} pursuant to {appName}’s <Link href="/privacy-policy" className='underline'>Privacy Policy</Link>. I understand that I can opt-out at any time by replying STOP.
                    </CheckboxFull>
                    <CheckboxFull field={'acceptedPartner'} val={data.acceptedPartner} classProps='lg:col-span-2' checkFunc={(evt) => handleChange(evt.target.id, evt.target.checked)} errors={errors}>
                        I would like to speak to a Partner.
                    </CheckboxFull>
                </div>
                <div className='flex justify-center'>
                    <PrimaryButton type="submit" disabled={processing} className='w-full md:w-max-content group bg-transparent text-primary-50 border border-primary-50 hover:bg-primary-50'>
                        {
                            processing ? (<>
                                <ImSpinner9 className='mr-2 animate-spin' /><span className='text-primary-50 group-hover:text-primary-500'>Submitting...</span>
                            </>) : <span className='text-primary-50 group-hover:text-primary-500'>Submit</span>
                        }
                    </PrimaryButton>
                </div>
            </form>
            <div className="flex justify-center my-6">
                <p className="caption text-primary-50">This site is protected by reCAPTCHA and the Google <Link href="https://policies.google.com/privacy?hl=en-US" className='underline'>Privacy Policy</Link> and <Link href="https://policies.google.com/terms?hl=en-US" className='underline'>Terms of Service</Link> apply.</p>
            </div>
        </>
    )
}
