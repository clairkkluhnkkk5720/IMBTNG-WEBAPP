<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    public function index ()
    {
        $users = User::orderBy('name')->with('bets.event', 'transactions')->paginate(15);

        return view('dashboard.members.index', compact('users'));
    }

    public function banned ()
    {
        $users = User::onlyTrashed()->orderBy('name')->with('bets.event', 'transactions')->paginate(15);

        return view('dashboard.members.banned', compact('users'));
    }

    public function show ($id)
    {
        $user         = User::withTrashed()->findOrFail($id);
        $bets         = $user->bets;
        $transactions = $user->transactions;

        return view(
            'dashboard.members.show',
            compact('user', 'bets', 'transactions')
        );
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

    public function bets ($id)
    {
        $user = User::withTrashed()->with('bets.event')->findOrFail($id);
        $bets = $user->bets;


        return view('dashboard.members.bets', [
            'user' => $user,
            'bets' => $bets,
            'p_title' => 'All Bets',
        ]);
    }

    public function winningBets ($id)
    {
        $user = User::withTrashed()->with('bets.event')->findOrFail($id);
        $bets = winningBets($user->bets);

        return view('dashboard.members.bets', [
            'user' => $user,
            'bets' => $bets,
            'p_title' => 'Winning Bets',
        ]);
    }

    public function losingBets ($id)
    {
        $user = User::withTrashed()->with('bets.event')->findOrFail($id);
        $bets = losingBets($user->bets);

        return view('dashboard.members.bets', [
            'user' => $user,
            'bets' => $bets,
            'p_title' => 'Losing Bets',
        ]);
    }

    public function pendingBets ($id)
    {
        $user = User::withTrashed()->with('bets.event')->findOrFail($id);
        $bets = pendingBets($user->bets);

        return view('dashboard.members.bets', [
            'user' => $user,
            'bets' => $bets,
            'p_title' => 'Pending Bets',
        ]);
    }
    
    public function destroy($id)
    {
        //
    }
}
