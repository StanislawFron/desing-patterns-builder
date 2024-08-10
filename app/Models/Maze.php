<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maze extends Model
{
    private array $rooms = [];

    public function addRoom(Room $room): void
    {
        $this->rooms[$room->getNumber()] = $room;
    }

    public function roomNo(int $roomNumber): ?Room
    {
        return $this->rooms[$roomNumber] ?? null;
    }

    public function renderMaze(): void
    {
        $this->renderMazeRooms();
    }

    private function renderMazeRooms(): void
    {
        $firstLine = '';
        $secondLine = '';
        $thirdLine = '';

        foreach ($this->rooms as $room) {
            $doors = $room->getDoors();
            $firstLine .= isset($doors['North']) ? '|̅̅&nbsp;̅̅|' : '|&#8254;&#8254;&#8254;&#8254;&#8254;&#8254;&#8254;&#8254;&#8254;|';
            $secondLine .= isset($doors['West']) ? '&thinsp;' : '|';
            $secondLine .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            $secondLine .= isset($doors['East']) ? '&thinsp;' : '|';
            $thirdLine .= '|______|';

            }

        echo $firstLine.'<br>';
        echo $secondLine.'<br>';
        echo $thirdLine.'<br>';
    }
}
