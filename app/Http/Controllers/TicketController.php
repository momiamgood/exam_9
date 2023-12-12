<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if (auth()->user()->role->title === 'admin'){
            $data = Ticket::all();
        } else $data = auth()->user()->ticket;

        return view('ticket.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticket.create', [
            'users' => User::all(),
            'statuses' => Status::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'car' => 'required',
            'time' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'status_id' => 'required',
        ]);

        Ticket::create($data);
        return redirect()->route('ticket.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        if (auth()->user()->role->title === 'admin'){
            $data = Ticket::all();
        } else $data = Ticket::where('id', $ticket->id)->where('user_id', Auth::id())->first();

        return view('ticket.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validate([
            'car' => 'required',
            'time' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'status_id' => 'required',
        ]);

        $ticket->update($data);
        return redirect()->route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
