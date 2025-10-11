import React from 'react'

function Video({video}) {
    return (
        <video
            src={video.src}
            autoPlay
            muted
            loop
            playsInline
            preload="metadata"
            className="w-full h-full object-cover"
            poster={video.fallback || ''}
        >
            Your browser does not support the video tag. Please upgrade your browser.
        </video>
    )
}

export default Video