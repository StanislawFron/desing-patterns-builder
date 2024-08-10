<?php

namespace App\Models;

use App\Builders\MazeBuilder;
use Illuminate\Database\Eloquent\Model;

class MazeGame extends Model
{
    public function createMaze(MazeBuilder $builder): ?Maze
    {
        $builder->buildMaze();
        $builder->buildRoom(1);
        $builder->buildRoom(2);
        $builder->buildRoom(3);
        $builder->buildRoom(4);
        $builder->buildRoom(5);
        $builder->buildRoom(6);
        $builder->buildDoor(1, 2);
        $builder->buildDoor(2, 3);
        $builder->buildDoor(3, 4);
        $builder->buildDoor(4, 5);
        $builder->buildDoor(5, 6);

        return $builder->getMaze();
    }
}
