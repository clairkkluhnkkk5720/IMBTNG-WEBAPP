<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    public function getGame ($slug)
    {
        return Game::where('slug', $slug)->firstOrFail();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $games = Game::latest()->paginate(15);

        return view('dashboard.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view('dashboard.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $this->validateGame($request);

        $game = new Game;

        $game->name    = $request->name;
        $game->slug    = $request->slug;
        $game->details = $request->details;

        if ($game->save()) {
            return redirect()->route('dashboard.games.index')->with(
                'global.success',
                'New Game is created successfully.'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while creating a new Game. Please try again later.'
        )->withInput();
    }

    public function validateGame (Request $request, $game = null)
    {
        $rules = [
            'name'    => 'required|string|min:3',
            'slug'    => 'required|string|min:3|unique:games,slug',
            'details' => 'nullable|string|min:10',
        ];

        if ($game and $game instanceof Game) {
            $rules['slug'] = [
                'required', 'string', 'min:3',
                Rule::unique('games')->ignore($game->id),
            ];
        }

        $this->validate($request, $rules);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($slug)
    {
        $game = $this->getGame($slug);

        return view('dashboard.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($slug)
    {
        $game = $this->getGame($slug);

        return view('dashboard.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $slug)
    {
        $game = $this->getGame($slug);

        $this->validateGame($request, $game);

        $game->name = $request->name;
        $game->slug = $request->slug;
        $game->details = $request->details;

        if ($game->save()) {
            return redirect()->route('dashboard.games.show', $game->slug)->with(
                'global.success',
                'Game information is updated successfully.'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while updating the game. Please try again later.'
        )->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($slug)
    {
        $game = $this->getGame($slug);

        if ($game->delete()) {
            return redirect()->route('dashboard.games.index')->with(
                'global.success',
                'Game is successfully deleted.'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while deleting the Game. Please try again later.'
        );
    }
}
