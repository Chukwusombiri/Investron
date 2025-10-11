import React from 'react'

export default function ContentBlock({ block }) {

    let content;
    switch (block.type) {
        case 'sub-topic':
            content = <h3 className='article-sub-heading text-primary-500 capitolium mt-3 mb-3'>{block.content}</h3>
            break;

        case 'paragraph':
            content = <p className='p1 mb-3'>{block.content}</p>
            break;
        case 'image':
            content = <img className='block w-full h-[30vh] md:h-[90vh] mb-2' src={`/storage/${block.content}`} />
            break;
        case 'ordered-list':
            const orderedList = JSON.parse(block.content);
            content = (<ul className='list-decimal pl-4 mb-2 space-y-1'>
                {
                    orderedList.map((item, idx) => <li key={idx} className='p2'>{item}</li>)
                }
            </ul>);
            break;
        case 'unordered-list':
            const unOrderedList = JSON.parse(block.content);
            content = (<ul className='list-none pl-4 mb-2 space-y-1'>
                {
                    unOrderedList.map((item, idx) => <li key={idx} className='p2'>{item}</li>)
                }
            </ul>);
            break;
        case 'table':
            const table = JSON.parse(block.content);
            content = (
                <div className="px-0 pt-0 pb-2">
                    <div className="p-0 overflow-x-auto">
                        <table className='items-center w-full mb-0 align-top border-collapse text-slate-500'>
                            <>
                                {
                                    table.head.hasData && <thead className="align-bottom">
                                        <tr>
                                            {
                                                table.head.data.map((col, idx) => <th className="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-600 opacity-90" key={idx}>{col}</th>)
                                            }
                                        </tr>
                                    </thead>
                                }
                            </>
                            <tbody>
                                {
                                    table.data.map((row, index) => <tr key={index}>
                                        {
                                            row.map((rowCol, ind) => <td className="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent" key={ind}>
                                                <p className="mb-0 text-sm leading-tight text-slate-700">
                                                    {rowCol}
                                                </p>
                                            </td>)
                                        }
                                    </tr>)
                                }
                            </tbody>
                        </table>
                    </div>
                </div>)
            break;
    }
    return (
        <div className='text-primary-400 py-4'>
            {
                content
            }
        </div>
    )
}
