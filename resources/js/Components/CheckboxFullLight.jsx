import React from 'react'
import Checkbox from './Checkbox';
import InputLabel from './InputLabel';


function CheckboxFullLight({ field, val, classProps = '', checkFunc, errors, children }) {
    const styles = {
        width: '5px',
        height: '8px',
        border: 'solid black 1px',
        borderRadius: '3px',
        backgroundColor: '#fff',

    }
    return (
        <div className={`${classProps}`}>
            <div className="flex">
                <input
                    id={field}
                    type="checkbox"
                    className="
                        appearance-none 
                        rounded 
                        size-5 
                        border 
                        border-primary-500 
                        ring ring-transparent 
                        hover:bg-transparent 
                        checked:bg-primary-500 
                        checked:hover:bg-primary-500 
                        checked:border-primary-500                         
                        focus:outline-none 
                        focus:ring-0 
                        checked:focus:bg-primary-500
                        active:bg-primary-500
                    "
                    checked={val}
                    onChange={checkFunc}
                />

                <InputLabel
                    htmlFor={field}
                    custom="text-[12px] ml-4 text-primary-500"
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

export default CheckboxFullLight