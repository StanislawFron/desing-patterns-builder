<?php

namespace App\Builders;

use App\Models\Maze;

abstract class MazeBuilder
{
    protected Maze $maze;
    public function buildMaze() : void
    {
        $this->maze = new Maze();
    }

    abstract public function buildRoom(int $roomNumber) :void;

    abstract public function buildDoor(int $roomFrom, int $roomTo) :void;

    public function getMaze(): ?Maze
    {
        return $this->maze;
    }

    protected function __construct()
    {

    }
}
