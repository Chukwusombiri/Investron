import React, { useEffect, useRef } from 'react'
// import "../../css/hero.css";
import LinkButton from './LinkButton';
import Video from './Video';
import { motion } from "motion/react"

function HeroCard({ hero, setActive, activeCard, children }) {
    const cardRef = useRef(null);

    /* set active card state on page scroll */
    useEffect(() => {
        const observer = new IntersectionObserver(
            ([entry]) => {
                if (entry.isIntersecting) setActive();
            },
            {
                root: null, // Observe within the viewport
                threshold: 0.1, // Trigger when 10% of the component is visible
            }
        );

        if (cardRef.current) {
            observer.observe(cardRef.current);
        }

        return () => {
            if (cardRef.current) {
                observer.unobserve(cardRef.current);
            }
        };
    }, []);

    // useEffect(()=>{
    //     const pos = cardRef.current.getBoundingClientRect().top;                   
    //     if(hero.id===activeCard){
    //         window.scrollTo({
    //             top: pos,
    //             behavior: 'smooth'
    //         })
    //     }
    // },[activeCard])
    return (
        <div ref={cardRef} className="w-full h-[100vh] relative bg-primary-500">
            <Video video={hero.video} />
            <div className="absolute top-0 left-0 w-[100%] h-[100vh] flex flex-col justify-center items-center gap-3 lg:mt-4 px-8">
                <motion.h1
                    initial={{ y: 100, opacity: 0 }}
                    whileInView={{ y: 0, opacity: 1 }}
                    transition={{ type: "spring", duration: 3 }}
                    className='text-primary-50 h1 text-center max-w-5xl'>
                    {hero.heading}
                </motion.h1>
                <motion.p
                    initial={{ y: 100, opacity: 0 }}
                    whileInView={{ y: 0, opacity: 1 }}
                    transition={{ type: "spring", duration: 3.5 }}
                    className='p text-primary-200 text-center w-[80%] mx-auto max-w-4xl mb-4'>{hero.paragraph}
                </motion.p>
                <motion.div
                    initial={{ y: 100, opacity: 0 }}
                    whileInView={{ y: 0, opacity: 1 }}
                    transition={{ type: "spring", duration: 3.5 }}
                >
                    <LinkButton to={hero.button.uri} classes='border-transparent bg-primary-50 hover:bg-gray-100'>{hero.button.text}</LinkButton>
                </motion.div>
                {children}
            </div>
        </div>
    )
}

export default HeroCard