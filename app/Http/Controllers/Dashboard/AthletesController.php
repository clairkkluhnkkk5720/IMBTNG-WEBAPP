<?php

namespace App\Http\Controllers\Dashboard;

use Image;
use App\Models\Game;
use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AthletesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        $games = Game::orderBy('name')->get();

        if ($request->has('game') and $request->game) {
            $game = Game::where('slug', $request->game)->firstOrFail();
            $query = $game->athletes()->orderBy('name');
        } else {
            $query = Athlete::orderBy('name');
        }

        $athletes = $query->with('game')->paginate(15);

        return view('dashboard.athletes.index', compact('athletes', 'games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $games = Game::orderBy('name')->get();

        return view('dashboard.athletes.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $this->validateAthlete($request);

        $athlete = new Athlete;

        $athlete->name    = $request->name;
        $athlete->slug    = $request->slug;
        $athlete->details = $request->details;
        $athlete->game_id = $request->game_id;

        // $athlete->image = $this->upload($request->file('image'));

        if ($athlete->save()) {
            return redirect()->route('dashboard.athletes.index')->with(
                'global.success',
                'A new athlete is created successfully.'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while creating a new Athlete. Please try again later.'
        )->withInput();
    }

    // protected function upload ($file)
    // {
    //     $filename = time() . $file->getClientOriginalExtension();

    //     Image::make($file)->resize(250, 250)->save(
    //         public_path("uploads\\athletes\\{$filename}")
    //     );

    //     Image::make($file)->resize(100, 100)->save(
    //         public_path("uploads\\athletes\\thumbs\\{$filename}")
    //     );

    //     return $filename;
    // }

    protected function validateAthlete (Request $request, $athlete = null)
    {
        $rules = [
            'name'    => 'required|string|min:3',
            'slug'    => 'required|string|min:3|unique:athletes,slug',
            'details' => 'nullable|string|min:10',
            'game_id' => 'required|numeric|exists:games,id',
            // 'image'   => [
            //     'nullable', 'file', 'image',
            //     Rule::dimensions()->minHeight(250)->minWidth(250)->ratio(1 / 1),
            // ];
        ];

        if ($athlete and $athlete instanceof Athlete) {
            $rules['slug'] = [
                'required', 'string', 'min:3',
                Rule::unique('athletes')->ignore($athlete->id),
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
        $athlete = $this->athlete($slug);

        return view('dashboard.athletes.show', compact('athlete'));
    }

    protected function athlete ($slug)
    {
        return Athlete::where('slug', $slug)->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($slug)
    {
        $games = Game::orderBy('name')->get();

        $athlete = $this->athlete($slug);

        return view('dashboard.athletes.edit', compact('games', 'athlete'));
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
        $athlete = $this->athlete($slug);

        $this->validateAthlete($request, $athlete);

        $athlete->name    = $request->name;
        $athlete->slug    = $request->slug;
        $athlete->details = $request->details;
        $athlete->game_id = $request->game_id;

        if ($athlete->save()) {
            return back()->with(
                'global.success',
                'Athlete information is updated successfully.'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while updating the Athlete. Please try again later.'
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
        $athlete = $this->athlete($slug);

        if ($athlete->delete()) {
            return redirect()->route('dashboard.athletes.index')->with(
                'global.success',
                'Athelete is deleted successfully'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while deleting the Athlete. Please try again later.'
        );
    }
}
