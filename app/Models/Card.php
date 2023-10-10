<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['b', 'i', 'n', 'g', 'o'];

    public function card(): HasOne
    {
        return $this->hasOne(Card::class);
    }

    public function generateRandom()
    {
        $history = $this->card()->firstOrCreate();

        $data = [
            'b' => [1, 15],
            'i' => [16, 30],
            'n' => [31, 45],
            'g' => [46, 60],
            'o' => [61, 75]
        ];

        $letter = array_rand($data);
        [$min, $max] = $data[$letter];
        $number = array_rand(range($min, $max));

        // TODO: to be optimized, time constraint
        $historyData = empty($history->{$letter}) ? [] : explode(',', $history->{$letter});

        if (!in_array($number, $historyData)) {
            $history->{$letter} = empty($history->{$letter}) ? $number : $history->{$letter} . ",$number";

            $history->save();
        }

        return [$letter, $number];
    }
}
