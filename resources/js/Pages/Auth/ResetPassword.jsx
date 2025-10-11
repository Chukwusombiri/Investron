import GGLikeInputLight from '@/Components/GGLikeInputLight';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, useForm } from '@inertiajs/react';

export default function ResetPassword({ token, email }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        token: token,
        email: email,
        password: '',
        password_confirmation: '',
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('password.store'), {
            onFinish: () => reset('password', 'password_confirmation'),
        });
    };

    return (
        <>
            <Head title="Reset Password" />
            <div className='flex justify-center py-10'>
                <h1 className='text-4xl md:text-5xl font-semibold capitolium tracking-wider'>Password reset</h1>
            </div>
            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="email" value="Email" />

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
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div className="mt-4">
                    <GGLikeInputLight
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        title={'New Password'}
                        field={'password'}
                        placeholder="New password"
                        autoComplete="new-password"
                        isFocused={true}
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">                    
                    <GGLikeInputLight
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        title={'Confirm new password'}
                        field={'password_confirmation'}
                        placeholder="Confirm new password"
                        autoComplete="new-password"
                        onChange={(e) =>
                            setData('password_confirmation', e.target.value)
                        }
                    />

                    <InputError
                        message={errors.password_confirmation}
                        className="mt-2"
                    />
                </div>

                <div className="mt-4 flex items-center justify-center">
                    <PrimaryButton className="ms-4 bg-vibrant text-primary-50" disabled={processing}>
                        Reset Password
                    </PrimaryButton>
                </div>
            </form>
        </>
    );
}
