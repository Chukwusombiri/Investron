<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class VerificationCodeController extends Controller
{
    public function validateCode(Request $request)
    {
        $validator = Validator::make(['code' => $request->code], [
            'code' => ['required', 'string', 'size:6'],
        ], [
            'code.required' => 'Verification code cannot be empty',
            'code.string' => 'Verification code must be either letters or numbers',
            'code.size' => 'Verification code must be 6 characters long',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => $validator->errors()->first('code'),
            ], 422);
        }

        $user = User::find(Auth::id());

        if (!$user) {
            return response()->json([
                'code' => 'Unable to find user.',
            ], 422);
        }

        $cachedCode = Cache::pull("email_verification_code:{$user->id}");

        if (!$cachedCode || $cachedCode !== $request->code) {
            return response()->json([
                'code' => 'The verification code is invalid or has expired.',
            ], 422);
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        $url = route('user.dashboard');

        return response()->json(['redirect' => $url], 200);
    }
}
