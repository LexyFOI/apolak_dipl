<?php

namespace App\Http\Controllers;


use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(){
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    public function store(){
        //validate
       $attributes = request()->validate(['event_name' => 'required',
            'startDate' => 'required',
            'endDate'=>'required',
            'payment'=>'required',
            'price'=>'required',
            'event_points'=>'required',
            'event_description'=>'required']);

        //persist
       // Event::create(request(['event_name', 'startDate', 'endDate','payment','price','event_points','event_description']));
        Event::create($attributes);

        //redirect
        return redirect('/events');
    }
}
