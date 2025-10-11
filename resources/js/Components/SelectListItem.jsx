import React from 'react'

function SelectListItem({option, clickFunc}) {
    return (
        <li           
            onClick={clickFunc}
            className="p-2 hover:bg-gray-100 cursor-pointer text-gray-700 text-sm"
        >
            {option.label}
        </li>
    )
}

export default SelectListItem