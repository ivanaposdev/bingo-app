<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class BingoBaseController extends Controller
{
    protected function generateCard(): Card
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

        $card[2][2] = 0;

        return Card::create([
            'b' => implode(',', $card[0]),
            'i' => implode(',', $card[1]),
            'n' => implode(',', $card[2]),
            'g' => implode(',', $card[3]),
            'o' => implode(',', $card[4]),
        ]);
    }

    protected function parse()
    {
    }
}
