<?php

namespace App\Http\Controllers;


use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(){
        $events = Event::all();//->where('startDate', ['>', '=='], now());

        return view('events.index', compact('events'));
    }

    public function show(Event $event){
        //$event = Event::findOrFail(request('event'));
        return view('events.show', compact('event'));
    }

    public function create(){
        return view('events/create', );
    }

    public function store(){
        //validate
       $attributes = request()->validate(['event_name' => 'required',
            'startDate' => 'required',
            'endDate'=>'required',
            'payment'=>'required',
            'price'=>'required',
            'event_points'=>'required',
            'event_description'=>'required',

           ]);//'owner_id' => 'required'

    //    $attributes['owner_id'] = auth()->id();
        //umjesto prethodnog postavljamo vlasnika događaja automatski:
        auth()->user()->events()->create($attributes);

      //  Event::create($attributes);

        //redirect
        return redirect('/events');
    }
}
