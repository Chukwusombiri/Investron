import Checkbox from '@/Components/Checkbox';
import GGLikeInput from '@/Components/GGLikeInput';
import GGLikeInputLight from '@/Components/GGLikeInputLight';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import { BsDashLg } from "react-icons/bs";
import { Head, Link, useForm, usePage } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const {appName} = usePage().props
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('login'), {
            onFinish: () => reset('password'),
        });
    };

    return (
        <>
            <Head title={`Client portal | ${appName}`} />
            <div className='flex justify-center py-10'>
                <h1 className='text-4xl md:text-5xl font-semibold capitolium tracking-wider'>Log in</h1>
            </div>
            {status && (
                <div className="mb-4 text-sm font-medium text-green-600">
                    {status}
                </div>
            )}

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="email" value="Email" />

                    <GGLikeInputLight
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        autoComplete="username"
                        placeholder="Email"
                        title={'Email'}
                        field={'email'}
                        isFocused={true}
                        onChange={(e) => setData('email', e.target.value)}
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div className="mt-6">
                    <GGLikeInputLight
                        title={'Password'}
                        field={'password'}
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Password"
                        value={data.password}
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4 block">
                    <label className="flex items-center">
                        <Checkbox
                            name="remember"
                            checked={data.remember}
                            onChangeFunc={(e) =>
                                setData('remember', e.target.checked)
                            }
                        />
                        <span className="ms-2 text-sm text-gray-600">
                            Remember me
                        </span>
                    </label>
                </div>

                <div className="mt-4 flex flex-col items-center justify-end">
                    <PrimaryButton className="ms-4 bg-vibrant text-primary-50" disabled={processing}>
                        Log in
                    </PrimaryButton>
                </div>
                <div className="flex justify-center items-center mt-2.5">
                    {canResetPassword && (
                        <Link
                            href={route('password.request')}
                            className="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        >
                            Forgot your password?
                        </Link>
                    )}
                    <BsDashLg className="rotate-90" />
                    <a className="underline text-sm text-gray-700 hover:text-primary-500" href='/register'>New member? Sign up.</a>
                </div>
            </form>
        </>
    );
}
