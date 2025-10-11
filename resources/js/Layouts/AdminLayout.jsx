import React from 'react'

function AdminLayout({children}) {
  return (
    <div>
        <h1 className='frank-bold text-4xl'>AdminLayout</h1>
        {children}
    </div>
  )
}

export default AdminLayout