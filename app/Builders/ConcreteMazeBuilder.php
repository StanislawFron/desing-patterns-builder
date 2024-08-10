<?php

namespace App\Builders;

use App\Models\Door;
use App\Models\Maze;
use App\Models\Room;
use App\Models\Wall;

class ConcreteMazeBuilder extends MazeBuilder
{
    protected Maze|int $currentMaze;

    public function __construct()
    {
        parent::__construct();
        $this->currentMaze = 0;
    }

    public function buildMaze() :void
    {
        $this->currentMaze = new Maze();
    }

    public function buildRoom(int $roomNumber) :void
    {
        if(!$this->currentMaze->roomNo($roomNumber)){
            $room = new Room($roomNumber);
            $this->currentMaze->addRoom($room);

            $room->setSide('North', new Wall());
            $room->setSide('South', new Wall());
            $room->setSide('East', new Wall());
            $room->setSide('West', new Wall());
        }
    }

    public function buildDoor(int $roomFrom, int $roomTo) :void
    {
        $roomFrom = $this->currentMaze->roomNo($roomFrom);
        $roomTo = $this->currentMaze->roomNo($roomTo);

        if ($roomFrom && $roomTo) {
            $door = new Door($roomFrom, $roomTo);
            $roomFrom->setSide('East', $door);
            $roomTo->setSide('West', $door);
        }
    }

    public function getMaze(): ?Maze
    {
        return $this->currentMaze;
    }
}
