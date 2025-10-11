import ArticleItem from '@/Components/ArticleItem';
import ContentBlock from '@/Components/ContentBlock';
import SecondaryLinkButton from '@/Components/SecondaryLinkButton';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import { Head, Link, usePage } from '@inertiajs/react'
import React from 'react'
import { BsDashLg } from 'react-icons/bs';

export default function ShowInsight({ }) {
    const { article, relatedArticles } = usePage().props;
    const { appName } = useGeneralContext();
    return (
        <div className='bg-primary-50'>
            <Head title={`${article.title} | ${appName}`} />
            <div className='bg-primary-50 relative px-6 pt-16 md:pt-32 pb-12 w-full max-w-4xl mx-auto min-h-screen flex flex-col gap-8'>
                {/* <div className="md:absolute -left-4 flex flex-row md:flex-col gap-3 flex-wrap items-center">

                </div> */}
                <div className="pt-14 flex gap-2 flex-wrap items-center text-xs frank-bold tracking-wide uppercase">
                    <Link href={`/insights/articles?topic=${article.topic_model.slug}`} className='text-blue-800 underline hover:no-underline'>{article.topic_model.title}</Link>
                    <BsDashLg className="rotate-90 size-4" />
                    <span className='text-gray-700'>{new Date(article.published_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</span>
                </div>
                <h2 className="cta-heading">
                    {article.title}
                </h2>
                <div className="w-full h-[30vh] md:h-[95vh]">
                    <img src={`/storage/${article.image}`} alt={`${article.title}'s main photo`} className="w-full h-full" />
                </div>
                <div className="w-full">
                    {
                        article.content_blocks && article.content_blocks.map((block, idx) => <ContentBlock block={block} key={block.id} />)
                    }
                </div>
                <div className="border-t pt-6">
                    <h4 className='h3 uppercase mb-4'>CONTENT DISCLOSURE</h4>
                    <p className="p1 mb-3">This information is for educational purposes and is not intended to provide, and should not be relied upon for, accounting, legal, tax, insurance, or investment advice. This does not constitute an offer to provide any services, nor a solicitation to purchase securities. The contents are not intended to be advice tailored to any particular person or situation. We believe the information provided is accurate and reliable, but do not warrant it as to completeness or accuracy. This information may include opinions or forecasts, including investment strategies and economic and market conditions; however, there is no guarantee that such opinions or forecasts will prove to be correct, and they also may change without notice. We encourage you to speak with a qualified professional regarding your scenario and the then-current applicable laws and rules.</p>
                    <p className="p1 mb-3">Different types of investments involve degrees of risk, including the loss of principal. The future performance of any investment or wealth management strategy, including those recommended by us, may not be profitable or suitable or prove successful. Past performance is not indicative of future results. One cannot invest directly in an index or benchmark, and those do not reflect the deduction of various fees that would diminish results. Any index or benchmark performance figures are for comparison purposes only, and client account holdings will not directly correspond to any such data.</p>
                    <p className="p1 mb-3">Advisory services are offered through Investron Private Wealth LLC and its affiliates, each being a registered investment adviser (“RIA”) regulated by the U.S. Securities and Exchange Commission (“SEC”). The advisory services are only offered in jurisdictions where the RIA is appropriately registered. The use of the term “registered” does not imply any particular level of skill or training and does not imply any approval by the SEC. For a complete discussion of the scope of advisory services offered, fees, and other disclosures, please review the RIA’s Disclosure Brochure (Form ADV Part 2A) and Form CRS, available upon request from the RIA and online at https://adviserinfo.sec.gov/. We also encourage you to review the RIA’s Privacy Policy and Code of Ethics, which are available upon request.</p>
                    <p className="p1 mb-3">Our clients must, in writing, advise us of personal, financial, or investment objective changes and any restrictions desired on our services so that we may re-evaluate any previous recommendations and adjust our advisory services as needed. For current clients, please advise us immediately if you are not receiving monthly account statements from your custodian. We encourage you to compare your custodial statements to any information we provide to you.</p>
                </div>
                {
                    (relatedArticles && relatedArticles.length > 0) && <div className="mt-8">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center gap-8">
                            {
                                relatedArticles.map(item => <ArticleItem article={item} key={item.slug} />)
                            }
                        </div>
                        <div className="px-8 flex justify-center pt-8">
                            {
                                (
                                    <SecondaryLinkButton to={'/insights/articles'}  className='text-primary-500 px-7 py-3 border border-2 border-primary-500'>
                                        View all
                                    </SecondaryLinkButton>
                                )
                            }
                        </div>
                    </div>
                }
            </div>
        </div>
    )
}
