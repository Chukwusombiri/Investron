import { Link } from '@inertiajs/react'
import React from 'react'

function SecondaryLinkButton({ children, to, classes=''}) {
  return (
    <Link href={to} className={`azo-sans uppercase px-7 py-3 md:px-8 md:py-3 lg:px-12 lg:py-3 rounded-full inline-flex justify-center items-center text-[13px] md:text-[15px] text-center ${classes}`}>
        {children}
    </Link>
  )
}

export default SecondaryLinkButton