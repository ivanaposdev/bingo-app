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

        $bingo->card()->associate($this->generateCard());

        $bingo->save();

        $user->card()->associate($this->generateCard(true));

        $user->save();

        return response()->json($bingo);
    }

    public function pick(Bingo $bingo): JsonResponse
    {
        // retrieve data from db
        // $bingo->card;
        return response()->json($bingo->card->generateRandom());
    }

    public function mark(Bingo $bingo, string $letter, string $number): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $card = $user->card;

        $card->{$letter} = empty($card->{$letter}) ? $number : $card->{$letter} . ",$number";

        $card->save();

        return response()->json($card);
    }

    public function verify(Bingo $bingo): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $userCard = $user->card;
        $bingoCard = $bingo->card;



        $bingo = ['b', 'i', 'n', 'g', 'o'];

        $isVerified = true;

        foreach ($bingo as $b) {
            $userData = explode(',', $userCard->{$b});
            $bingoData = explode(',', $bingoCard->{$b});

            if (
                !empty(array_diff($userData, $bingoData))
                && !empty(array_diff($bingoData, $userData))
                || (count($userData) != count($bingoData))
            ) {
                $isVerified = false;
            }
        }

        return response()->json($isVerified);
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
