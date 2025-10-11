import React from 'react'
import SecondaryLinkButton from './SecondaryLinkbutton'
import Video from './Video'

function FeatureCard({ feature, buttonClasses = '', isEven }) {
  return (
    <div className='px-12 max-w-5xl mx-auto'>
      <div className="grid grid-cols-1 lg:grid-cols-2 justify-center items-center gap-6 lg:gap-10">
        <div className={isEven ? 'lg:order-2' : 'lg:order-1'}>
          <div className='w-full lg:max-w-lg mx-auto flex justify-center relative h-[55vh] lg:h-[85vh]'>
            <Video video={feature.video} />
            <div className="absolute inset-0 z-30 mx-4 my-10 sm:m-16">
              <img src={feature.imageUrl} alt={feature.heading + 'photo'} className='relative w-full h-full object-cover'/>
            </div>
          </div>
        </div>
        <div className={isEven ? 'lg:order-1' : 'lg:order-2'}>
          <div className='w-full lg:max-w-md lg:pl-4 mx-auto flex flex-col justify-center gap-8'>
            <div>
              <h2 className='h2 mb-4'>{feature.heading}</h2>
              <p className='p2 leading-normal font-medium'>{feature.description}</p>
            </div>
            {
              feature.button && <div className="flex justify-start">
                <SecondaryLinkButton to={feature.button.link} classes={buttonClasses}>{feature.button.text}</SecondaryLinkButton>
              </div>
            }

          </div>
        </div>
      </div>
    </div>
  )
}

export default FeatureCard