import Checkbox from '@/Components/Checkbox';
import CheckboxFull from '@/Components/CheckboxFull';
import GGLikeInputLight from '@/Components/GGLikeInputLight';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { useGeneralContext } from '@/Contexts/GeneralContext';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Register({ref}) {
    const { appName } = useGeneralContext()
    const { data, setData, post, processing, errors, reset } = useForm({
        username: '',
        email: '',
        password: '',
        password_confirmation: '',
        acceptedTerms: false,
        upline: ref,
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('register'), {
            onFinish: () => reset('password', 'password_confirmation'),
        });
    };

    return (
        <>
            <Head title="Register" />
            <div className='flex justify-center py-10'>
                <h1 className='text-4xl md:text-5xl font-semibold capitolium tracking-wider'>Sign up</h1>
            </div>
            <form onSubmit={submit}>
                <div>
                    <GGLikeInputLight
                        id="username"
                        name="username"
                        value={data.username}
                        autoComplete="username"
                        placeholder="Username"
                        title={'Username'}
                        field={'username'}
                        isFocused={true}
                        onChange={(e) => setData('username', e.target.value)}
                        required
                    />
                    <InputError message={errors.name} className="mt-2" />
                </div>

                <div className="mt-4">
                    <GGLikeInputLight
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        title={'Email'}
                        field={'email'}
                        placeholder="Email"
                        autoComplete="username"
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div className="mt-4">
                    <GGLikeInputLight
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        title={'Password'}
                        field={'password'}
                        placeholder="Password"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">
                    <GGLikeInputLight
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        title={'Confirm Password'}
                        field={'password_confirmation'}
                        placeholder="Confirm Password"
                        autoComplete="new-password"
                        onChange={(e) =>
                            setData('password_confirmation', e.target.value)
                        }
                        required
                    />

                    <InputError
                        message={errors.password_confirmation}
                        className="mt-2"
                    />
                </div>
                <div>
                    <div className="mt-4 flex">
                        <Checkbox
                            id="acceptedTerms"
                            type="checkbox"
                            className="text-primary-500 border-0.5 border-primary-500 checked:bg-primary-100 checked:text-primary-500 focus:bg-primary-100"
                            checked={data.acceptedTerms}
                            onChangeFunc={(e) => setData('acceptedTerms', e.target.checked)}
                            required
                        />
                        <InputLabel
                            htmlFor="acceptedTerms"
                            custom='ml-4 text-primary-500'
                        >
                            Yes, I agree to {appName}'s <Link href="/privacy-policy" className='underline'>Privacy Policy</Link> and <Link href='/terms-of-use' className='underline'>Terms of Use.</Link>
                        </InputLabel>
                    </div>
                    <InputError
                        message={errors.acceptedTerms}
                        className="mt-2"
                    />
                </div>

                <div className="mt-4 flex items-center justify-end">
                    <a
                        href={route('login')}
                        className="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Already registered?
                    </a>

                    <PrimaryButton className="ms-4 bg-vibrant text-primary-50" disabled={processing}>
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </>
    );
}
