import React from 'react'
import InputError from './InputError'

function TextArea({classProps='', title, field, val, handleChangeFunc,errors}) {
    return (
        <div className={`${classProps} relative`}>
            <textarea
                id={field}
                className="peer block w-full h-20 px-2 pt-5 pb-1 text-sm text-primary-50 bg-transparent border-0 border-b border-primary-100 appearance-none focus:outline-none focus:ring-0 focus:border-primary-50"                
                value={val}
                onChange={(e) =>handleChangeFunc(field,e.target.value)}
                placeholder=''
            >

            </textarea>
            <label
                htmlFor={field}
                className="absolute text-sm text-primary-100 transition-transform duration-300 transform -translate-y-3 scale-75 top-1 left-2 origin-[0] peer-placeholder-shown:translate-y-4 peer-placeholder-shown:scale-100 peer-focus:-translate-y-3 peer-focus:scale-75"
            >
                {title}
            </label>
            {(errors && errors[field]) && <InputError message={errors[field]} className='mt-2' id={field}/>}
        </div>
    )
}

export default TextArea