<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('start_date', 'asc')->get()->map(function ($event) {
            return [
                'title' => $event->title,
                'date' => Carbon::parse($event->start_date)->format('d F Y') . ' - ' . Carbon::parse($event->end_date)->format('d F Y'),
                'description' => $event->description,
                'voucher' => $event->voucher_code,
            ];
        });

        return view('events.index', compact('events'));
    }
}