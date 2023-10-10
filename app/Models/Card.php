<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['b', 'i', 'n', 'g', 'o'];

    public function generateRandom()
    {
        $data = [
            'b' => $this->b,
            'i' => $this->i,
            'n' => $this->n,
            'g' => $this->g,
            'o' => $this->o,
        ];

        $letter = array_rand($data);
        $numbers = explode(',', $data[$letter]);
        $number = $numbers[array_rand($numbers)];

        // exclude the center
        if ($letter == 'n' && $number == 0) {
            $this->generateRandom();
        }

        return [$letter, $number];
    }
}
