import { Link, usePage } from '@inertiajs/react';
import React from 'react'
import { BsDashLg } from "react-icons/bs";
export default function ArticleItem({ article }) {
    const {appName} = usePage().props
    return (
        <Link href={`/insights/articles/${article.slug}`} className="group bg-primary-50 hover:bg-primary-500 p-4">
            <div className="flex flex-col gap-2">
                <div className="relative overflow-hidden w-full h-72">
                    <img
                        src={`/storage/${article.image}`}
                        alt={article.title}
                        title={article.title}
                        className="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110"
                    />
                </div>
                <p className="flex flex-wrap items-center gap-2 text-xs frank-bold group-hover:text-primary-50 tracking-wide">
                    <span>{new Date(article.published_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric'})}</span>
                    <BsDashLg  className="rotate-90"/>
                    <span className='uppercase'>{appName}</span>
                </p>
                <h3 className="text-2xl capitolium text-wrap group-hover:text-primary-50">
                    {article.title}
                </h3>
            </div>
        </Link>
    )
}
