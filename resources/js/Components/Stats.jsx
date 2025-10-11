import { useInView } from 'motion/react'
import React, { useRef } from 'react'
import CountUp from 'react-countup'

export default function Stats() {
    const statRef = useRef(null);
    const isInView = useInView(statRef)
    return (
        <div ref={statRef} className="mt-6 lg:mt-10 w-full flex justify-center flex-wrap gap-x-12 md:gap-x-20 gap-y-6">
            <div className="flex flex-col gap-3 items-center">
                <h2 className='capitolium text-primary-50 text-[28px] md:text-[42px] tracking-widest'>
                    {
                        isInView && <CountUp
                            start={10}
                            end={185}
                            duration={2.5}
                            separator=","
                            prefix="$"
                        />
                    }
                    billion</h2>
                <p className='uppercase text-[11px] text-primary-200 frank-bold'>in clients assets</p>
            </div>
            <div className="flex flex-col gap-3 items-center">
                <h2 className='capitolium text-primary-50 text-[28px] md:text-4xl lg:text-5xl tracking-widest'>
                    {
                        isInView && <CountUp
                            start={1}
                            end={240}
                            duration={2.5}
                            separator=","
                            suffix="+"
                        />
                    }
                </h2>
                <p className='uppercase text-[11px] text-primary-200 frank-bold'>Partners</p>
            </div>
        </div>
    )
}
