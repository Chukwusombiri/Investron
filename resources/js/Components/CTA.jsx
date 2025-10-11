import React from 'react'

function CTA({ children, bgColor = 'bg-primary-50' }) {
    return (
        <div className={`w-full h-[40vh] lg:h-[50vh] ${bgColor}`}>
            <div className='h-full px-12 max-w-5xl mx-auto flex flex-col justify-center items-center gap-6'>
                {children}
            </div>
        </div>
    )
}

export default CTA