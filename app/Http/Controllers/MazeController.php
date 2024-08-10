<?php

namespace App\Http\Controllers;

use App\Builders\ConcreteMazeBuilder;
use App\Models\MazeGame;
use Illuminate\Http\Request;

class MazeController extends Controller
{
    public function __invoke(Request $request)
    {
        $builder = new ConcreteMazeBuilder();
        $game = new MazeGame();
        $maze = $game->createMaze($builder);
        $maze->renderMaze();
    }
}
