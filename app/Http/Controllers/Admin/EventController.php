<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use Illuminate\Support\Str;
use App\Models\event;
use App\Models\category;
use App\Models\transaction_detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\View;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = event::paginate(10);
        return view('admin.event.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = category::all();

        return view('admin.event.form', [
            "categories" => $categories
        ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        //
        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        $request->merge([
            'is_popular' => $request->has('is_popular')
        ]);

        if ($request->hasFile('files')) {
            # code...
            $photos = [];

            foreach ($request->file('files') as $file) {
                # code...
                $photos[] = $file->store('events', 'public');
            }

            $request->merge([
                'photos' => $photos
            ]);
        }

        Event::create($request->except('files'));

        return redirect()->route('admin.events.index')->with('succes', 'event berhasil disimpan');
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
    public function edit(event $event)
    {
        //
        $categories = category::all();

        return view('admin.event.form', [
            "categories" => $categories
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        //
        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        $request->merge([
            'is_popular' => $request->has('is_popular')
        ]);

        if ($request->hasFile('files')) {
            # code...
            $photos = [];

            foreach ($request->file('files') as $file) {
                # code...
                $photos[] = $file->store('events', 'public');
            }

            $request->merge([
                'photos' => $photos
            ]);
        }

        Event::find($id)->update($request->except('files'));

        return redirect()->route('admin.events.index')->with('succes', 'event berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();

        return redirect()->route('admin.events.index')->with('succes', 'Event Berhasil Dihapus');
    }

    public function scan(Event $event)
    {
        return view('admin.scan.index', compact('event'));
    }

    public function scanAPI(Event $event)
    {
        request()->validate([
            'code' => 'required|exists:transaction_details,code',
        ]);

        $transaction_detail = Transaction_detail::where('code', request()->code)->first();

        if ($transaction_detail) {
            $transaction_detail->update([
                'is_redeemed' => true,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Check in success',
            ]);
        }
    }
}
