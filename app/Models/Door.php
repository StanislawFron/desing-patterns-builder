<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    private Room $room1;
    private Room $room2;

    public function __construct(Room $room1, Room $room2)
    {
        $this->room1 = $room1;
        $this->room2 = $room2;
    }
}
