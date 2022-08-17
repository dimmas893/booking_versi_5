<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data profile user berhasil diambil');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            return (new UserResource($user))->additional([
                'token' => $user->createToken('myAppToken')->plainTextToken,
            ]);
        }

        return response()->json([
            'message' => 'Your credential does not match.',
        ], 401);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function register(Request $request)
    { {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
                'password' => ['required', 'min:8'],
                'role' => ['required'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => bcrypt($request->password)
            ]);

            $token = $user->createToken('myAppToken');

            return (new UserResource($user))->additional([
                'token' => $token->plainTextToken,
            ]);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->tokens()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();
        $user->update($data);

        return ResponseFormatter::success($user, 'Profile Updated');
    }
}
