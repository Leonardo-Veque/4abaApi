<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        try {
            $request->authenticate();
        } catch (ValidationException $e) {
            return response()->json($e->validator->errors());
        }

        $request->session()->regenerate();


        return response()->json(["data" => Auth::user()]);
    }

    public function requestToken(LoginRequest $request)
    {
        try {
            $token = $request->getToken();
            

            return $this->jsonSuccess($token);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();

            return $this->jsonErrorArray($errors);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
