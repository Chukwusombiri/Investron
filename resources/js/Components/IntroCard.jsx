import React from 'react'
import Video from './Video'

function IntroCard({ image='', video=null, heading, children }) {
    const bgStyle = {
        backgroundImage: `url('/images/${image}')`
    }
    return (
        <div
            style={video ? {} : bgStyle}
            className="relative h-[50vh] md:h-[80vh] bg-no-repeat bg-cover bg-center flex flex-col justify-center items-center"
        >
            {
                video && <Video video={video}/>
            }
            <div className="absolute inset-0 z-10 flex flex-col justify-center items-center bg-primary-500/35">
                <h1 className='mt-8 lg:mt-20 capitalize capitolium tracking-wide text-3xl lg:text-7xl text-primary-50 text-center px-8'>{heading}</h1>                
                {
                    children
                }                           
            </div>
        </div>
    )
}

export default IntroCard