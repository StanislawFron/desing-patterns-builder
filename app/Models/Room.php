<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    private int $number;
    private array $sides = [];

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setSide(string $direction, $side): void
    {
        $this->sides[$direction] = $side;
    }

    public function getDoors() :array
    {
        $doors = [];
        foreach ($this->sides as $key=>$side){
            if($side instanceof Door){
                $doors[$key] = $side;
            }
        }
        return $doors;
    }
}
