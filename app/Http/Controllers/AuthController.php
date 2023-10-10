<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        //
    }

    public function store(AuthRequest $request)
    {
        $validated = $request->safe();
        $user = User::where('name', $validated->name)->first();

        Hash::check($validated->password, $user->password);

        return $user->createToken($validated->name)->plainTextToken;
    }

    public function register(AuthRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        return $user->createToken($user->name)->plainTextToken;
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
