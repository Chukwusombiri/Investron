import React, { useEffect, useRef } from 'react'
import InputError from './InputError';

function GGLikeInputLight({title, field, className='', isFocused=false, ...props}) {   
    const localRef = useRef(null); 
    useEffect(() => {
        if (isFocused) {
            localRef.current?.focus();
        }
    }, [isFocused]);

    return (
        <div className="relative w-full">
            <input 
            ref={localRef}
            {...props}
            className={`peer bg-primary-50 h-10 w-full text-sm text-primary-500 autofill:bg-primary-50 autofill:text-primary-500 placeholder-transparent px-2 outline-none border-0 ring-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-400`}           
            required />
            <label htmlFor={field} className="absolute left-0 -top-3 text-sm text-primary-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-600 peer-placeholder-shown:top-3 peer-focus:-top-3 peer-focus:text-primary-500 peer-focus:text-xs transition-all">{title}</label>                                   
        </div>
    )
}

export default GGLikeInputLight