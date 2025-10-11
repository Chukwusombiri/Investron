import React, { useEffect, useState, useRef } from 'react';
import ShowAdvisorDetails from './ShowAdvisorDetails';
import FloatingLabelInput from './FloatingLabelInput';
import AdvisorItem from './AdvisorItem';

function AdvisorsCard({ advisors }) {
    const [query, setQuery] = useState('');
    const [showAdvisors, setShowAdvisors] = useState(advisors);
    const [selected, setSelected] = useState(null);
    const [pressed, setPressed] = useState(null);

    // Ref for the root div
    const rootRef = useRef();

    function handleSelectAdvisor(obj) {
        setSelected(obj);
    }

    useEffect(() => {
        const newAdvisors = advisors.filter((item) => {
            const name = item.name.toLowerCase();
            const q = query.toLowerCase();
            return name.includes(q);
        });
        setShowAdvisors(newAdvisors);
    }, [query]);

    useEffect(() => {
        // Scroll to the top of the root div when an advisor is selected
        if (selected && rootRef.current) {
            // rootRef.current.scrollIntoView({ behavior: 'smooth', block: 'start' });
            const topRootRef = rootRef.current.getBoundingClientRect().top + window.scrollY;
            window.scrollTo({ top:topRootRef, behavior: 'smooth' });
        }
    }, [selected]);

    return (
        <div ref={rootRef} className="bg-primary-50">
            {selected ? (
                <ShowAdvisorDetails advisor={selected} setSelected={setSelected} />
            ) : (
                <div className="py-12 md:py-16 lg:py-20">
                    <div className="flex justify-center pb-10 border-b border-gray-300 flex-wrap">
                        <FloatingLabelInput query={query} changeFunc={(e) => setQuery(e.target.value)} />
                    </div>
                    {/* advisors grid */}
                    <div className="pt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-w-5xl mx-auto">
                        {showAdvisors.map((item, idx) => (
                            <AdvisorItem
                                key={idx}
                                advisor={item}
                                isPressed={pressed === item.id}
                                clickFunc={() => handleSelectAdvisor(item)}
                                mouseDownFunc={() => setPressed(item.id)}
                            />
                        ))}
                    </div>
                </div>
            )}
        </div>
    );
}

export default AdvisorsCard;
