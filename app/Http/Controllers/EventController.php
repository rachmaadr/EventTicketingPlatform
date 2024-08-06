<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\ticket;
use App\Models\transaction;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $slug)
    {
        //
        $event = event::fetch($slug);
        return view('front.details', compact('event'));

    }

    public function checkout(Request $request, $slug)
    {
        // 
        $event = event::fetch($slug);
        
        $selectedTickets = collect($request->tickets)->filter(function($quantity){
            return $quantity > 0;
        });

        $tickets = $selectedTickets->map(function($quantity, $id){
            $ticket = ticket::find($id);

            return $ticket ? (object)[
                'name' => $ticket->name,
                'quantity' => (int) $quantity,
                'price' => $ticket->price,
                'total' => $ticket->price * $quantity,
            ] : null;
        }) ->filter();

        $uniquePrice = rand(1, 10);
        $tax = 10*$tickets->sum('total');
        $totalPrice = $tickets->sum('total') + $tax + $uniquePrice;

        $request->session()->put('event', $event);
        $request->session()->put('tickets', $tickets);
        $request->session()->put('uniquePrice', $uniquePrice);
        $request->session()->put('totalPrice', $totalPrice);

        return view('front.checkout', compact('event', 'tickets', 'uniquePrice', 'tax', 'totalPrice'));
    }

    public function checkoutPay(Request $request)
    {
        // 
        $request->validate([
            'name' => 'required|string|max:277',
            'email' => 'required|email',
            'payment_method' => 'required|string|in:manual_transfer'
        ]);

        $event = $request->session()->get('event');
        $tickets = $request->session()->get('tickets');
        $uniquePrice = $request->session()->get('uniquePrice');
        $totalPrice = $request->session()->get('totalPrice');


        $transaction = transaction::create([
            'code' => 'TRX' . mt_rand(10000, 999999),
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
            'status' => 'pending',
            'uniquePrice' => $uniquePrice,
            'total_price' => $totalPrice,
            'payment_method' => $request->payment_method,
        ]);

        foreach ($tickets as $ticket) {
            $transaction->transaction_detail()->create([
                'code' => 'TIX' . mt_rand(10000, 999999),
                'ticket_id' => Ticket::where('name', $ticket->name)->first()->id,
                'transaction_id' => $transaction->id,
                'is_redeemed' => false,
            ]);
        }
        return redirect()->route('checkout-succes');
    }

    public function checkoutSuccess()
    {
        return view('front.checkout-succes');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        //
    }
}
