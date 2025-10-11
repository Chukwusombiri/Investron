import React from 'react'
import FeatureCard from './FeatureCard';

function Features({features,layoutClasses,featureButtonClasses}) {
    
    return (
        <div className={`py-12 lg:py-24 space-y-20 lg:space-y-40 ${layoutClasses}`}>
            {
                features.map((feature, index )=> <FeatureCard key={feature.id} isEven={feature.id%2==0} feature={feature} buttonClasses={featureButtonClasses} />)
            }
        </div>
    )
}

export default Features