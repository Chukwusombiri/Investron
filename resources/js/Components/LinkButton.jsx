import { Link } from '@inertiajs/react'
import React from 'react'

function LinkButton({ children, to, classes='bg-primary-50 border-primary-50 text-primary-500 hover:bg-gray-200'}) {
  return (
    <Link href={to} className={`azo-sans uppercase px-10 md:px-16 py-3 md:py-3.5 rounded-full inline-flex justify-center items-center text-[13px] md:text-[15px] text-center border-2 ${classes} hover:border-opacity-80`}>
        {children}
    </Link>
  )
}

export default LinkButton