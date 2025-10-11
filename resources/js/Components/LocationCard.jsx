import { locationResource } from '@/utils/utilities';
import React, { useRef, useState } from 'react'
import { BiMenuAltRight } from "react-icons/bi";

function LocationCard() {
    const [active, setActive] = useState(0);
    const [isOpen, setIsOpen] = useState(false);
    const location = locationResource[active];
    const mobileToggleRef = useRef(null);
    const bgStyle = {
        backgroundImage: `url('/images/locations/${location.img}')`
    }
    return (
        <div className='px-4'>
            <div className="max-w-5xl mx-auto rounded-lg bg-cover bg-center bg-no-repeat" style={bgStyle}>
                <div className="bg-primary-500/10 lg:flex flex-wrap gap-4 p-4 h-[100vh]">
                    {/* locations */}                    
                    <div className="relative w-full lg:max-w-44 bg-white/20 backdrop-blur-sm rounded-lg py-4 mb-8 lg:mb-0 lg:h-[100%]">
                        {/* mobile screen control */}
                        <div ref={mobileToggleRef} className="lg:hidden flex justify-between items-center px-4">
                            <span>{location.state}</span>
                            <BiMenuAltRight onClick={()=>setIsOpen(! isOpen)} size={24}/>
                        </div>
                        {/* locations */}
                        <ul className={`${isOpen ? 'block' : 'hidden'} absolute mt-2 w-full z-30 lg:relative lg:block space-y-3 h-[60vh] lg:h-[95%] bg-white/20 lg:bg-inherit lg:backdrop-blur-none overflow-y-scroll  scrollbar  scrollbar-thin scrollbar-thumb-gray-500 scrollbar-track-transparent`}>
                            {
                                locationResource.map((loc,idx) => <li key={idx} onClick={()=>{
                                    setActive(idx);
                                    setIsOpen(false);
                                }} className={`${idx===active ? 'bg-gray-700/50' : ''} px-4 py-2 cursor-pointer`}>{loc.state}</li>)
                            }                            
                        </ul>
                    </div>                                  
                    {/* offices */}                    
                    <div className='w-full lg:max-w-80'>
                        <div className={`${isOpen ? 'hidden md:block' : ''}max-h-[65vh] lg:max-h-[95vh] bg-white/30 backdrop-blur-sm px-5 rounded-lg overflow-y-scroll  scrollbar  scrollbar-thin scrollbar-thumb-gray-500 scrollbar-track-transparent`}>
                            <ul className="divide-y">
                                {
                                    location.offices.map((office, idx) => (
                                        <li className='py-4' key={idx}>
                                            <div className="flex flex-col gap-3">
                                                <h4 className="font-semibold text-lg frank-bold">{office.city}</h4>
                                                {
                                                    office.address.map((adr, ind) => (
                                                        <div className='w-full' key={ind}>
                                                            <p className='text-md text-wrap break-words'>{adr.line}</p>
                                                            <p className='text-md text-wrap break-words'>{adr.zip}</p>
                                                        </div>
                                                    ))
                                                }
                                            </div>
                                        </li>
                                    ))
                                }
                            </ul>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    )
}

export default LocationCard