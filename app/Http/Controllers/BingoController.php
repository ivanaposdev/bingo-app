<?php

namespace App\Http\Controllers;

use App\Models\Bingo;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BingoController extends BingoBaseController
{
    public function index()
    {
        //
    }

    public function start(): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $bingo = $user->bingos()->create();

        $card = $this->generateCard();

        $bingo->card()->associate($card);

        $bingo->save();

        return response()->json($bingo);
    }

    public function pick(Bingo $bingo)
    {
        // retrieve data from db
        // $bingo->card;
        return response()->json($bingo->card->generateRandom());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Bingo $bingo): JsonResponse
    {
        return response()->json($bingo);
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
