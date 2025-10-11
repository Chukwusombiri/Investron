import { useState } from 'react'
import { Link, useForm } from '@inertiajs/react';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import { optionsResource } from '@/utils/utilities';
import { SlClose } from "react-icons/sl";
import SelectListLight from './SelectListLight';
import TextAreaLight from './TextAreaLight';
import CheckboxFullLight from './CheckboxFullLight';
import SecondaryButton from './SecondaryButton';
import { ImSpinner9 } from "react-icons/im";

export default function ContactModal({
    advisorName = null,   
    onClose = () => { },
    setHasSubmitted
}) {
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
        acceptedPartner: true,
        advisor: advisorName
    });

    const handleChange = (field, value) => {
        if (clearErrors(data[field])) clearErrors(data[field]);        
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
        <div className='w-full p-6'>
            <div className="flex justify-between flex-nowrap items-start">
                <h2 className="text-3xl md:text-4xl capitolium">
                    Get in touch
                </h2>
                <SlClose size={28} className='cursor-pointer' onClick={onClose} />
            </div>
            <p className='mb-10'>Please tell us a bit about yourself, so we can better serve you in the future.</p>
            <form onSubmit={handleFormSubmit} method='post' className='w-full'>
                <div className="h-auto w-full md:grid-cols-2 justify-center items-center space-y-4 md:space-y-0">
                    <div className="relative flex flex-col md:pb-2">
                        <input type="text" placeholder='First name' value={data.first_name} onChange={(e) => setData('first_name', e.target.value)} className='peer appearance-none border-0 ring-0 border-b border-gray-300 text-primary-500 placeholder:text-gray-600 placeholder:text-sm outline-none focus:ring-0' />
                        <label htmlFor="first_name" className='absolute -top-2 left-2 text-xs peer-placeholder-shown:hidden peer-focus:block peer-focus:-top-2 peer-focus:text-xs text-blue-500 transition-all duration-300'>First name</label>
                        {(errors && errors.first_name) && <div className='text-pink-600 text-sm tracking-wide mb-1'>{errors.first_name}</div>}            
                    </div>
                    <div className="relative flex flex-col md:pb-2">
                        <input type="text" placeholder='Last name' id='last_name' value={data.last_name} onChange={(e) => setData('last_name', e.target.value)} className='peer appearance-none border-0 ring-0 border-b border-gray-300 text-primary-500 placeholder:text-gray-600 placeholder:text-sm outline-none focus:ring-0' />
                        <label htmlFor="last_name" className='absolute -top-2 left-2 text-xs peer-placeholder-shown:hidden peer-focus:block peer-focus:-top-2 peer-focus:text-xs text-blue-500 transition-all duration-300'>Last name</label>
                        {(errors && errors.last_name) && <div className='text-pink-600 text-sm tracking-wide mb-1'>{errors.last_name}</div>}
                    </div>
                    <div className="relative flex flex-col md:pb-2">
                        <input type="text" placeholder='Email' value={data.email} onChange={(e) => setData('email', e.target.value)} className='peer appearance-none border-0 ring-0 border-b border-gray-300 text-primary-500 placeholder:text-gray-600 placeholder:text-sm outline-none focus:ring-0' />
                        <label htmlFor="email" className='absolute -top-2 left-2 text-xs peer-placeholder-shown:hidden peer-focus:block peer-focus:-top-2 peer-focus:text-xs text-blue-500 transition-all duration-300'>Email</label>
                        {(errors && errors.email) && <div className='text-pink-600 text-sm tracking-wide mb-1'>{errors.email}</div>}
                    </div>
                    <div className="relative flex flex-col md:pb-2">
                        <input type="text" placeholder='Phone' value={data.phone} onChange={(e) => setData('phone', e.target.value)} className='peer appearance-none border-0 ring-0 border-b border-gray-300 text-primary-500 placeholder:text-gray-600 placeholder:text-sm outline-none focus:ring-0' />
                        <label htmlFor="phone" className='absolute -top-2 left-2 text-xs peer-placeholder-shown:hidden peer-focus:block peer-focus:-top-2 peer-focus:text-xs text-blue-500 transition-all duration-300'>Phone</label>
                        {(errors && errors.phone) && <div className='text-pink-600 text-sm tracking-wide mb-1'>{errors.phone}</div>}
                    </div>
                    <div className="relative flex flex-col md:pb-2">
                        <input type="text" placeholder='Zipcode' value={data.zipcode} onChange={(e) => setData('zipcode', e.target.value)} className='peer appearance-none border-0 ring-0 border-b border-gray-300 text-primary-500 placeholder:text-gray-600 placeholder:text-sm outline-none focus:ring-0' />
                        <label htmlFor="zipcode" className='absolute -top-2 left-2 text-xs peer-placeholder-shown:hidden peer-focus:block peer-focus:-top-2 peer-focus:text-xs text-blue-500 transition-all duration-300'>Zipcode</label>
                        {(errors && errors.zipcode) && <div className='text-pink-600 text-sm tracking-wide mb-1'>{errors.zipcode}</div>}
                    </div>
                    <SelectListLight title="Investable assets?" 
                    val={data.asset} onChange={handleChange} 
                    field='asset' errors={errors} 
                    options={optionsResource.assetOptions} 
                    classProps='md:pb-2' />
                    <SelectListLight
                        title="What can we help you with?"
                        val={data.demand}
                        onChange={handleChange}
                        field='demand'
                        errors={errors}
                        options={optionsResource.demandOptions}
                        classProps='col-span-2 md:pb-2' />
                    <TextAreaLight
                        title="Additional comment"
                        val={data.comment}
                        handleChangeFunc={handleChange}
                        field='comment'
                        errors={errors}
                        classProps='col-span-2 pb-4'
                    />   
                    <div className='flex flex-col gap-4 mt-4'>
                    <CheckboxFullLight field={'acceptedTerms'} val={data.acceptedTerms} classProps='col-span-2' checkFunc={(evt) => handleChange(evt.target.id, evt.target.checked)} errors={errors}>
                        I have read and agree to {appName}’s <Link href="/privacy-policy" className='underline'>Privacy Policy</Link> and <Link href='/terms-of-use' className='underline'>Terms of Use.</Link>
                    </CheckboxFullLight>
                    
                    <CheckboxFullLight field={'acceptedNewsLetter'} val={data.acceptedNewsLetter} classProps='col-span-2' checkFunc={(evt) => handleChange(evt.target.id, evt.target.checked)} errors={errors}>
                        By checking this box, I agree to receive promotional text messages from {appName} pursuant to {appName}’s <Link href="/privacy-policy" className='underline'>Privacy Policy</Link>. I understand that I can opt-out at any time by replying STOP.
                    </CheckboxFullLight>    
                    </div>                                                                    
                </div>
                <div className='flex justify-center mt-4'>
                    <SecondaryButton type="submit" disabled={processing} className='group bg-primary-500 text-primary-50 hover:text-primary-500 border border-primary-500 hover:bg-opacity-80 px-8 py-3'>
                        {
                            processing ? (<>
                                <ImSpinner9 className='mr-2 animate-spin' /><span className='text-primary-50 group-hover:text-primary-500'>Submitting...</span>
                            </>) : <span className='text-primary-50 group-hover:text-primary-500'>Submit</span>
                        }
                    </SecondaryButton>
                </div>
            </form>
            <div className="flex justify-center my-6">
                <p className="text-[10px] text-gray-700">This site is protected by reCAPTCHA and the Google <Link href="https://policies.google.com/privacy?hl=en-US" className='underline'>Privacy Policy</Link> and <Link href="https://policies.google.com/terms?hl=en-US" className='underline'>Terms of Service</Link> apply.</p>
            </div>
        </div>
    )
}
