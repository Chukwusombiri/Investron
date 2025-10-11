import React from 'react'

export default function PageFeatureItem({ pageFeatureItem }) {
    return (
        <div className="flex flex-col gap-3">
            <h4 className='p1 frank-bold text-wrap'>{pageFeatureItem.heading}</h4>
            <p className='p2 text-primary-100'>{pageFeatureItem.description}</p>
        </div>
    )
}
