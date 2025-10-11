import React from 'react'
import Checkbox from './Checkbox';
import InputLabel from './InputLabel';


function CheckboxFull({field,val,classProps='',checkFunc,errors,children}) {
    return (
        <div className={`${classProps}`}>
            <div className="flex">
                <Checkbox
                    id={field}
                    type="checkbox"
                    className="border border-primary-50 checked:bg-primary-100 checked:text-primary-500 focus:bg-primary-100"
                    checked={val}
                    onChangeFunc={checkFunc}                    
                />
                <InputLabel
                    htmlFor={field}
                    custom='ml-4'
                >
                    {children}
                </InputLabel>
            </div>
            {
                errors[field] && <p className='text-pink-600 text-xs tracking-wide mt-2'>{errors[field]}</p>
            }
        </div>
    )
}

export default CheckboxFull