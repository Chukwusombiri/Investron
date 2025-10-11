import React from 'react'
import PageFeatureItem from './PageFeatureItem'

export default function PageFeatures({ pageFeatures, layoutClasses, children }) {
    return (
        <div className="bg-primary-500 text-primary-50 py-12 md:py-16 lg:py-20 px-6">
            <div className="max-w-5xl mx-auto">
                <div className='mb-8 lg:mb-16'>
                    {children}
                </div>
                <div className={`grid grid-cols-1 ${layoutClasses} gap-12 lg:gap-16`}>
                    {
                        pageFeatures.length > 0 && pageFeatures.map(solution => <PageFeatureItem key={solution.id} pageFeatureItem={solution}/>)
                    }
                </div>
            </div>
        </div>
    )
}
