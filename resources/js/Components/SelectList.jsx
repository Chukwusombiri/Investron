import React, { useEffect, useRef, useState } from 'react'
import { FaChevronUp } from "react-icons/fa";
import SelectListItem from './SelectListItem';
import { document } from 'postcss';

function SelectList({ field, onChange, title, errors = null, isTampered = false, options, classProps='' }) {
    const [isOpen, setIsOpen] = useState(false);
    const [selectedOption, setSelectedOption] = useState(title)
    const selectRef = useRef(null);

    const changeToArray = (obj) => {
        let arr = []
        if(obj instanceof Array){
            obj.forEach((element,index) => {
                arr.push(<SelectListItem option={element} key={index} clickFunc={()=>handleSelect(field,element.value)}/>)
            });
        }else{
            for (const key in obj) {
                if (Object.prototype.hasOwnProperty.call(obj, key)) {
                    const element = obj[key];                    
                    arr.push(<li key={key} className='border-b last:border-0 mb-2 last:mb-0'>
                        <h4 className='pt-2 text-center text-md font-semibold text-primary-500 mb'>{element.title}</h4>
                        <ul className='pl-0 space-y py-2' role='list' >
                            {
                                element.options.map((el,idx)=><SelectListItem option={el} key={idx} clickFunc={()=>handleSelect(field,el.value)}/>)
                            }
                        </ul>
                    </li>) 
                }
            }
        }

        return arr;
    }

    function handleSelect(key,value){
        setSelectedOption(value);
        setIsOpen(false);
        onChange(key, value)
    }

    useEffect(()=>{
        function outsideClick(evt){
            if(selectRef.current && !selectRef.current.contains(evt.target)){
                setIsOpen(false);
            }
        }

        window.addEventListener('click',outsideClick);

        return () => {
            window.removeEventListener('click',outsideClick);
        }
    },[]);
    const arrOptions = changeToArray(options);

    return (
        <div className={`${classProps} relative`} ref={selectRef}>
            <button
                type='button'
                id={field}
                name={field}
                onClick={()=>setIsOpen(! isOpen)}
                className={`peer bg-transparent h-10 w-full inline-flex justify-between items-center text-sm ${selectedOption==title ?  'text-primary-100' : 'text-primary-50'} px-2 outline-none border-0 ring-0 border-b border-primary-100 focus:outline-none focus:ring-0 focus:border-primary-100 ${isTampered ? 'border-emerald-500 focus:border-b-2 focus:border-emerald-500 invalid:border-pink-500 invalid:focus:border-b-2 invalid:focus:border-pink-600' : ''}`}
            >
                {selectedOption} <FaChevronUp className={!isOpen && 'rotate-180'}/>
            </button>

            {(errors && errors[field]) && <div className='text-pink-600 text-sm tracking-wide'>{errors[field]}</div>}            
            {isOpen && (
                <ul className="absolute mt-1 w-full z-10 border border-gray-300 rounded-lg bg-primary-50 shadow-md space-y py-2 max-h-[70vh] overflow-hidden overflow-y-scroll scrollbar scrollbar-thin scrollbar-thumb-rounded scrollbar-thumb-gray-500 scrollbar-track-transparent">                   
                    {
                        arrOptions
                    }
                </ul>
            )}
        </div>
    )
}

export default SelectList