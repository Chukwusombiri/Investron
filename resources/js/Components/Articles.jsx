import React, { useEffect, useState } from 'react'
import { BiCaretDown } from "react-icons/bi";
import Checkbox from './Checkbox';
import { BiCollapseAlt } from "react-icons/bi";
import ArticleItem from './ArticleItem';
import SecondaryButton from './SecondaryButton';
import { router, usePage } from '@inertiajs/react';

export default function Articles({ articlesArr = [] }) {
    const count = 12;
    const [limit, setLimit] = useState(count);
    const articlesToDisplay = articlesArr.filter((item, idx) => (idx+1)<=limit);
    const [topicFilter, setTopicFilter] = useState([]);
    const [topicFilterSlug, setTopicFilterSlug] = useState([]);
    const [filterIsOpen, setFilterIsOpen] = useState(false);
    const { sentTopics } = usePage().props;
    const filterPlaceholder = topicFilter.length > 0
        ? topicFilter.join(', ').substring(0, 30) + (topicFilter.join(', ').length > 30 ? '...' : '')
        : 'All topics';

    function handleFilterToggle(val) {
        const isSelected = topicFilter.includes(val.title);
        if (isSelected) {
            const newFilter = topicFilter.filter(topic => topic !== val.title);
            setTopicFilter(newFilter);
            const newFilterSlug = topicFilterSlug.filter(topicSlug => topicSlug !== val.slug);
            setTopicFilterSlug(newFilterSlug);

            if (newFilterSlug.length < 1) {
                router.get('/insights/articles', {}, {
                    preserveState: true,
                    preserveScroll: true,
                    only: ['articles']
                })
            }
        } else {
            setTopicFilter([...topicFilter, val.title]);
            setTopicFilterSlug([...topicFilterSlug, val.slug]);
        }
    }

    useEffect(() => {
        if (topicFilterSlug.length > 0) {

            router.get('/insights/articles', {
                topic: topicFilterSlug.join(',')
            }, {
                preserveState: true,
                preserveScroll: true,
                only: ['articles']
            })
        }
    }, [topicFilterSlug]);


    return (
        <section className="py-12 md:py-16 lg:py-20 px-8 bg-primary-50 text-primary-500">
            <div className="max-w-5xl mx-auto">
                <div className="flex border-b border-gray-300 mb-4 md:mb-8">
                    <h4 className="border-b-2 border-primary-500 pb-2 frank-bold">Articles</h4>
                </div>
                {/* filter */}
                <div className="relative">
                    {/* toggle button */}
                    <div className="relative mb-4 flex">
                        <button className="inline-flex max-w-full md:max-w-md overflow-hidden px-5 py-3 rounded-full border border-gray-300 text-primary-500 justify-between items-center flex-nowrap"
                            onClick={() => setFilterIsOpen(!filterIsOpen)}
                        >
                            <span className="text-sm md:text-md lg:text-lg mr-3 text-nowrap overflow-hidden">{filterPlaceholder}</span>
                            <BiCaretDown className={`${filterIsOpen ? 'rotate-180' : ''} size-6`} />
                        </button>
                    </div>
                    {/* dropdown */}
                    {filterIsOpen && (
                        <div className="absolute mt-1 w-full md:max-w-sm z-10 border border-gray-300 rounded-lg bg-primary-50 shadow-md py-4">
                            <div className="flex justify-between flex-nowrap items-center pb-4 border-b border-gray-300 px-6">
                                <p className='frank-bold text-lg'>All Topics</p>
                                <button
                                    onClick={() => setFilterIsOpen(false)}
                                    className="rounded-full w-9 h-9 inline-flex items-center justify-center hover:bg-gray-300 hover:shadow">
                                    <BiCollapseAlt size={24} />
                                </button>
                            </div>
                            <ul className='space-y-4 p-6' role='list'>
                                {
                                    sentTopics.map((item, idx) => <li key={item.slug} className='flex'>
                                        <Checkbox id={item.title.replace(/\s+/g, '')} value={item.title} checked={topicFilter.includes(item.title)} onChangeFunc={() => handleFilterToggle(item)} />
                                        <label htmlFor={item.title.replace(/\s+/g, '')} className='text-wrap ml-4 azo-sans text-primary-500'>{item.title}</label>
                                    </li>)
                                }
                            </ul>
                            <div className="flex pt-4 border-t border-gray-300 px-6">
                                <button
                                    onClick={() => {
                                        setTopicFilter([]);
                                        setTopicFilterSlug([]);
                                        setFilterIsOpen(false);
                                    }}
                                    className="appearance-none text-blue-500 tracking-wide underline font-medium text-md">
                                    Clear
                                </button>
                            </div>
                        </div>
                    )}
                </div>
                {/* articles grid */}
                <div className="mt-8">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center gap-8">
                        {
                            articlesToDisplay.length > 0
                                ? articlesToDisplay.map(item => <ArticleItem article={item} key={item.slug} />)
                                : <p className="text-center text-primary-500">No articles found for the selected topics.</p>
                        }
                    </div>
                    <div className="px-8 flex justify-center pt-8">
                        {
                            articlesArr.length > 0 && (
                                articlesArr.length > limit ? <SecondaryButton onClick={() => setLimit(limit + count)} className='text-primary-500 px-7 py-3 rounded-full'>
                                    load more
                                </SecondaryButton> : (articlesToDisplay.length>0 && <p className='text-sm text-primary-500 text-center tracking-wide'>Congratulations! You've made it to the end.</p>)
                            )
                        }
                    </div>
                </div>
            </div>
        </section>
    )
}