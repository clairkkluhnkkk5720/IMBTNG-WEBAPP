<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $games = Game::orderBy('name')->get();

        $teams = Team::orderBy('name')->paginate(15);

        return view('dashboard.teams.index', compact('games', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $games = Game::orderBy('name')->get();

        return view('dashboard.teams.create', compact('games'));
    }

    public function finishCreate (Request $request)
    {
        $this->validateStep1($request);

        $game     = Game::findOrFail($request->game_id);
        $athletes = $game->athletes;

        if (!$athletes->count()) {
            return back()->with(
                'global.error',
                'Selected Game has no athletes. Please choose another game.'
            )->withInput();
        }

        return view('dashboard.teams.finishCreate', compact('athletes', 'game'));
    }

    protected function validateStep1 (Request $request, $team = null)
    {
        $rules = [
            'name'    => 'required|string|min:3',
            'slug'    => 'required|string|min:3|unique:teams,slug',
            'details' => 'nullable|string|min:10',
            'game_id' => 'required|numeric',
        ];

        if ($team and $team instanceof Team) {
            $rules['slug'] = [
                'required', 'string', 'min:3',
                Rule::unique('teams')->ignore($team->id),
            ];
        }

        $this->validate($request, $rules);
    }

    protected function validateStep2 (Request $request)
    {
        $this->validate($request, [
            'athletes' => 'required|array|min:2',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStep2($request);

        $team = new Team;

        $team->name = $request->name;
        $team->slug = $request->slug;
        $team->details = $request->details;
        $team->game_id = $request->game_id;

        if (!$team->save()) {
            return redirect()->route('dashboard.teams.create')->with(
                'global.error',
                'Something went wrong. Please try again.'
            )->withInput();
        }

        $team->athletes()->attach($request->athletes);

        return redirect()->route('dashboard.teams.index')->with(
            'global.success',
            'A new team is created successfully.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($slug)
    {
        $team     = $this->team($slug);
        $game     = $team->game;
        $athletes = $team->athletes;

        return view('dashboard.teams.show', compact(
            'team', 'game', 'athletes'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($slug)
    {
        $team  = $this->team($slug);
        $games = Game::orderBy('name')->get();

        return view('dashboard.teams.edit', compact('team', 'games'));
    }

    public function finishEdit (Request $request, $slug)
    {
        $team = $this->team($slug);

        $this->validateStep1($request, $team);

        $game = Game::findOrFail($request->game_id);

        $athletes = $game->athletes;

        if (!$athletes->count()) {
            return back()->with(
                'global.error',
                'Selected Game has no athletes. Please choose another game.'
            )->withInput();
        }

        $previousAthletes = $team->athletes;

        $previous = [];

        foreach ($previousAthletes as $athlete) {
            $previous[] = $athlete->id;
        }

        return view('dashboard.teams.finishEdit', compact(
            'team', 'athletes', 'previous', 'game'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $team = $this->team($slug);

        $this->validateStep2($request);

        $team->name = $request->name;
        $team->slug = $request->slug;
        $team->details = $request->details;
        $team->game_id = $request->game_id;

        if (!$team->save()) {
            return redirect()->route('dashboard.teams.edit', $team->slug)->with(
                'global.error',
                'Something went wrong. Please try again.'
            )->withInput();
        }

        $team->athletes()->detach();
        $team->athletes()->attach($request->athletes);

        return redirect()->route('dashboard.teams.index')->with(
            'global.success',
            'Team information is updated successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($slug)
    {
        $team = $this->team($slug);

        if ($team->delete()) {
            return redirect()->route('dashboard.teams.index')->with(
                'global.success',
                'Team deleted successfully'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while deleting the team. Please try again later.'
        );
    }

    protected function team ($slug)
    {
        return Team::where('slug', $slug)->firstOrFail();
    }
}
