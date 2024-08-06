<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TicketRequest;
use Illuminate\Http\Request;
use App\Models\event;
use App\Models\ticket;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        //
        $tickets = Ticket::where('event_id', $event->id)->paginate(10);
        return view('admin.ticket.index', compact('event', 'tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event, Ticket $ticket)
    {
        //

        return view('admin.ticket.form', [
            "event" => $event
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Event $event, TicketRequest $request)
    {
        //
        $request->merge([
            'event_id' => $event->id
        ]);
        Ticket::create($request->all());

        return redirect()->route('admin.events.tickets.index')->with('success', 'Tiket berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event, Ticket $ticket)
    {
        //

        return view('admin.ticket.form', [
            'ticket' => $ticket,
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Event $event, TicketRequest $request, string $id)
    {
        //
        Ticket::find($id)->update($request->all());

        return redirect()->route('admin.events.tickets.index', $event->id)->with('success', 'Tiket berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Ticket $ticket)
    {
        //
        $ticket->delete();

        return redirect()->route('admin.events.tickets.index')->with('succes', 'Event Berhasil Dihapus');
    }
}
