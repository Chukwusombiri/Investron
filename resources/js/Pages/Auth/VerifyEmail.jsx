import GGLikeInputLight from '@/Components/GGLikeInputLight';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';
import { useState } from 'react';

export default function VerifyEmail({ status }) {
    const { post, processing } = useForm({});
    const [code, setCode] = useState('');
    const [customError, setCustomError] = useState(null);
    const [isLoading, setIsLoading] = useState(false);

    const submit = (e) => {
        setCustomError(null);
        post(route('verification.send'));
    };

    const verify = async (e) => {
        e.preventDefault();
        setIsLoading(true);
        setCustomError(null);
        try {
            const resp = await fetch(route('user.validate.code'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                credentials: 'same-origin',
                body: JSON.stringify({ code })
            });

            const data = await resp.json();
            setIsLoading(false);
            if (data.code) {
                setCustomError(data.code);                
            }

            if (data.redirect) {
                setCustomError(null);
                window.location.href = data.redirect;
            }

        } catch (error) {
            setIsLoading(false);
            console.error(error);
        }
    };


    return (
        <>
            <Head title="Email Verification" />
            <div className='flex justify-center py-10'>
                <h1 className='text-4xl font-semibold capitolium tracking-wider'>Email Verification</h1>
            </div>
            <div className="mb-4 text-sm text-gray-600">
                Thanks for signing up! Before getting started, could you verify
                your email address by entering 6-digit code we just emailed to
                you? Couldn't find the email? Check your spam folder and If you didn't receive the email,  we will gladly send you
                another.
            </div>

            {status === 'verification-link-sent' && (
                <div className="mb-4 text-sm font-medium text-green-600">
                    A new 6-digit code has been sent to the email address
                    you provided during registration.
                </div>
            )}

            {customError && (
                <div className="mb-4 text-sm font-medium text-red-600">
                    {customError}
                </div>
            )}

            <form onSubmit={verify}>
                <div className="flex items-center gap-2">
                    <input
                        id="code"
                        type="text"
                        name="code"
                        maxLength="6"
                        value={code}
                        required
                        autoFocus
                        placeholder="ABC123"
                        onChange={(e) => setCode(e.target.value)}
                        className={
                            'block w-full appearance-none rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-400 '}
                    />
                    <button
                        disabled={isLoading}
                        className={`inline-flex items-center justify-center azo-sans uppercase px-8 py-2.5 rounded-lg bg-primary-50 border-primary-50 bg-vibrant text-primary-50 hover:bg-opacity-80 uppercase tracking-widest text-md transition duration-150 ease-in-out disabled:opacity-25`}>
                        verify
                    </button>
                </div>
            </form>

            <div className="my-4 flex items-center justify-between">
                <SecondaryButton disabled={processing} onClick={submit}>
                    Resend code
                </SecondaryButton>

                <Link
                    href={route('logout')}
                    method="post"
                    as="button"
                    className="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Log Out
                </Link>
            </div>
        </>
    );
}
