import React from 'react'

function GGLikeInput({val, field, onChange, title, type='text', errors=null, isTampered=false, className}) {
    function handleChange(evt){
        onChange(field,evt.target.value)
    }
    return (
        <div className="relative w-full">
            <input 
            type={type} 
            id={field} 
            name={field} 
            value={val}
            onChange={handleChange}
            className={`peer bg-transparent h-7 md:h-10 w-full text-primary-50 autofill:bg-transparent autofill:text-primary-50 placeholder-transparent px-2 outline-none border-0 ring-0 border-b border-primary-100 focus:outline-none focus:ring-0 focus:border-primary-100 ${isTampered ? 'border-emerald-500 focus:border-b-2 focus:border-emerald-500 invalid:border-pink-500 invalid:focus:border-b-2 invalid:focus:border-pink-600' : ''}`}
            placeholder={title} 
            required />
            <label htmlFor={field} className="absolute cursor-text left-0 -top-3 text-xs md:text-sm text-primary-50 bg-inherit mx-1 px-1 peer-placeholder-shown:text-sm peer-placeholder-shown:text-primary-100 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-primary-100 peer-focus:text-xs transition-all">{title}</label>
            {(errors && errors[field]) && <div className='text-pink-600 text-xs md:text-sm tracking-wide'>{errors[field]}</div>}
            {isTampered && <p className='invisible peer-invalid:visible text-pink-600 text-xs tracking-wide mt-2'>{field=='email' ? 'Please provide a valid email address' : title + ' is required'}</p>}
        </div>
    )
}

export default GGLikeInput