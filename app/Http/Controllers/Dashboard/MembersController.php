<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $users = User::orderBy('firstname')->with('bets.event', 'transactions')->paginate(15);

        return view('dashboard.members.index', compact('users'));
    }

    public function banned ()
    {
        $users = User::onlyTrashed()->with('bets.event', 'transactions')->paginate(15);

        return view('dashboard.members.banned', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user         = User::withTrashed()->findOrFail($id);
        $bets         = $user->bets;
        $transactions = $user->transactions;

        return view(
            'dashboard.members.show',
            compact('user', 'bets', 'transactions')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ban(User $user)
    {
        if ($user->delete()) {
            return redirect()->route('dashboard.members.index')->with(
                'global.success',
                'Member banned successfully.'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while banning the Member. Please try again later.'
        );   
    }

    public function unban ($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);

        if ($user->restore()) {
            return redirect()->route('dashboard.members.banned')->with(
                'global.success',
                'Ban is removed from the user successfully.'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while removing ban from the Member. Please try again later.'
        ); 
    }

    public function bets ($id)
    {
        $user = User::withTrashed()->with('bets.event', 'bets.player')->findOrFail($id);
        $bets = $user->bets;


        return view('dashboard.members.bets', [
            'user' => $user,
            'bets' => $bets,
            'p_title' => 'All Bets',
        ]);
    }

    public function winningBets ($id)
    {
        $user = User::withTrashed()->with('bets.event', 'bets.player')->findOrFail($id);
        $bets = winningBets($user->bets);

        return view('dashboard.members.bets', [
            'user' => $user,
            'bets' => $bets,
            'p_title' => 'Winning Bets',
        ]);
    }

    public function losingBets ($id)
    {
        $user = User::withTrashed()->with('bets.event', 'bets.player')->findOrFail($id);
        $bets = losingBets($user->bets);

        return view('dashboard.members.bets', [
            'user' => $user,
            'bets' => $bets,
            'p_title' => 'Losing Bets',
        ]);
    }

    public function pendingBets ($id)
    {
        $user = User::withTrashed()->with('bets.event', 'bets.player')->findOrFail($id);
        $bets = pendingBets($user->bets);

        return view('dashboard.members.bets', [
            'user' => $user,
            'bets' => $bets,
            'p_title' => 'Pending Bets',
        ]);
    }

    public function transactions ($id)
    {
        $user = User::withTrashed()->with('transactions.bet')->findOrFail($id);
        $transactions = $user->transactions;

        return view('dashboard.members.transactions', [
            'user'         => $user,
            'transactions' => $transactions,
        ]);
    }
}
