import { useEffect, useRef, useState } from 'react'
import { FaRegDotCircle } from "react-icons/fa";
import { GoDotFill } from "react-icons/go";
import HeroCard from './HeroCard';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import Stats from './Stats';


export default function Hero() {
    const { menuOpen } = useGeneralContext();
    const [activeHero, setActiveHero] = useState(1);
    const [heroItems, setHeroItems] = useState(
        [
            {
                id: 1,
                heading: 'Wealth management centered around you',
                paragraph: 'We focus on exceeding expectations, simplifying lives, and helping establish lasting legacies.',
                button: {
                    text: 'discover our services',
                    uri: '/wealth-management'
                },
                video: {
                    src: '/videos/Home-Blue.mp4',
                    fallback: '/images/Home-Blue.jpg',
                }
            },
            {
                id: 2,
                heading: 'Real wealth requires real solutions',
                paragraph: 'Comprehensive family office services designed to manage wealth from a 360-degree perspective.',
                button: {
                    text: 'explore our solutions',
                    uri: '/family-office-solutions'
                },
                video: {
                    src: '/videos/Home-Red.mp4',
                    fallback: '/images/Home-Red.jpg',
                }
            },
            {
                id: 3,
                heading: 'Find a wealth advisor',
                paragraph: 'Leverage an exclusive network of experts to help you achieve your personal and professional financial goals.',
                button: {
                    text: 'find an advisor',
                    uri: '/find-an-advisor'
                },
                video: {
                    src: '/videos/Home-Dark.mp4',
                    fallback: '/images/Home-Dark.jpg',
                }
            }
        ]
    );
    const [showSelector, setShowSelector] = useState(true);
    const heroRef = useRef(null);

    /* Remove or show hero controls */
    useEffect(() => {
        const observer = new IntersectionObserver(
            ([entry]) => {
                setShowSelector(entry.isIntersecting);
            },
            {
                root: null,
                threshold: 0.2,
            }
        );

        if (heroRef.current) {
            observer.observe(heroRef.current);
        }

        return () => {
            if (heroRef.current) {
                observer.unobserve(heroRef.current);
            }
        };
    }, [])



    return (
        <div>
            <div ref={heroRef} className="min-h-screen relative">
                {
                    (showSelector && !menuOpen) && <div className="text-primary-500 hidden lg:block fixed left-[5%] top-[50%] w-[20px] h-max-content z-40 transform translate-y-[-50%] flex flex-col gap-2">
                        {
                            heroItems.map(nav => <button className='relative cursor-pointer ' key={nav.id} onClick={() => setActiveHero(nav.id)}>{
                                activeHero == nav.id ? <FaRegDotCircle className='text-primary-50' /> : <GoDotFill className='text-gray-400' />
                            }</button>)
                        }
                    </div>
                }

                <div className="w-full relative">
                    <HeroCard activeCard={activeHero} hero={heroItems[0]} key={heroItems[0].id} setActive={() => setActiveHero(heroItems[0].id)} />
                    <HeroCard activeCard={activeHero} hero={heroItems[1]} key={heroItems[1].id} setActive={() => setActiveHero(heroItems[1].id)}>
                        <Stats />
                    </HeroCard>
                    <HeroCard activeCard={activeHero} hero={heroItems[2]} key={heroItems[2].id} setActive={() => setActiveHero(heroItems[2].id)}>
                        <div className="flex justify-center gap-6">
                            <Stats />
                        </div>
                    </HeroCard>
                </div>
            </div>
        </div>
    )
}
