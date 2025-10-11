import React, { useRef } from 'react'
import { BsSearch } from "react-icons/bs";

export default function FloatingLabelInput({query, changeFunc}) {
    const inputRef = useRef(null);
    return (
        <div className="relative w-full max-w-sm">
            <input
                ref={inputRef}
                type="text"
                id="search"
                value={query}
                onChange={changeFunc}
                placeholder="Search by Name"
                className="peer w-full rounded-full border border-gray-300 bg-transparent px-4 py-2 pl-10 text-sm focus:outline-none focus:border-1 focus:border-blue-300 placeholder:text-xs"
            />
            <label
                htmlFor="search"
                className="absolute left-2 top-2 text-sm text-primary-500 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:left-10 peer-placeholder-shown:text-primary-500 peer-focus:-top-2 peer-focus:left-4 peer-focus:text-xs peer-focus:text-blue-500 bg-primary-50 px-1">
                Search by Name
            </label>
            <div className="absolute left-3 top-2.5 flex items-center">
                <BsSearch className="h-5 w-5 text-primary-500" onClick={()=>inputRef.current.focus()}/>
            </div>
        </div>
    )
}
