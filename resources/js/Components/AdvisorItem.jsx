import React, { useState } from 'react'
import { IoIosArrowForward } from "react-icons/io";

export default function AdvisorItem({ advisor, isPressed = false, mouseDownFunc, clickFunc }) {
    return (
        <div
            className={`group bg-primary-50 hover:bg-primary-200 py-4 px-5 border-b  ${isPressed ? 'border border-vibrant' : ''}`}
            onMouseDown={mouseDownFunc}
            onClick={clickFunc}
        >
            <div className="hidden md:block flex flex-col gap-2">
                <div className="relative overflow-hidden w-full h-52" style={{
                    backgroundImage: 'url(/images/advisors/advisor-bg.jpg)',
                    backgroundSize: 'cover',
                    backgroundRepeat: 'no-repeat'
                }}>
                    <img
                        src={`/images/advisors/${advisor.image}`}
                        alt={advisor.name}
                        className="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110"
                    />
                </div>
                <div>
                    <p className="text-xs frank-bold uppercase">
                        {advisor.title}
                    </p>
                    <p className="text-xs text-gray-600 frank-bold uppercase">
                        {advisor.region}
                    </p>
                </div>
                <h3 className="text-xl capitolium text-wrap tracking-tight">
                    {advisor.name}
                </h3>
            </div>

            {/* mobile */}
            <div className="flex justify-between items-center flex-nowrap md:hidden cursor-pointer">
                <div className="flex flex-col max-w-[50%]">
                    <h3 className="text-xl capitolium text-wrap tracking-tight">
                        {advisor.name}
                    </h3>
                    <p className="text-xs font-semibold capitalize text-gray-500 text-wrap break-words">
                        {advisor.title}
                    </p>
                </div>
                <div className="flex justify-between flex-nowrap">
                    <p className="text-[10px] text-gray-600 frank-bold uppercase mr-2">
                        {advisor.region}
                    </p>
                    <IoIosArrowForward />
                </div>
            </div>
        </div>
    )
}

