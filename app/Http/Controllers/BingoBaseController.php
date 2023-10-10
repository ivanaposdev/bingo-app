<?php

namespace App\Http\Controllers;

use App\Models\Card;

class BingoBaseController extends Controller
{
    const BINGO = ['b', 'i', 'n', 'g', 'o'];

    protected function generateCard(bool $isEmpty = false): Card
    {
        $card = [];
        $minMax = [
            [1, 15],
            [16, 30],
            [31, 45],
            [46, 60],
            [61, 75]
        ];

        foreach ($minMax as list($min, $max)) {
            $column = range($min, $max);
            shuffle($column);
            $card[] = array_slice($column, 0, 5, true);
        }

        return Card::create($isEmpty ? [] : [
            'b' => implode(',', $card[0]),
            'i' => implode(',', $card[1]),
            'n' => implode(',', $card[2]),
            'g' => implode(',', $card[3]),
            'o' => implode(',', $card[4]),
        ]);
    }
}
