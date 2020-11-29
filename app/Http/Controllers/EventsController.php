<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Student;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class EventsController extends Controller
{
    public function index(){
       //$events = auth()->user()->events; //dohvati samo događaje prijavljenog korisnika
        $events = Event::all();//->where('startDate', ['>', '=='], now()); //treba ih prikazat od najnoviheg prema najstarijem

        return view('events.index', compact('events'));
    }

    public function show(Event $event){
        $student_data = Student::all();
        return view('events.show', compact('event', 'student_data'));
    }

    public function create(){
        return view('events/create');
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
