@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>Lista događaja</h1>
                <div class="card-header">
                    <a href="/events/create">Kreiraj novi</a>
                </div>

                <div class="card-body">
                    <ul>
                        @forelse($events as $event)
                            <h2>
                                <a href="{{ $event->path() }}"> {{ $event->event_name}} </a>
                            </h2>
                            <li> traje od {{$event->startDate}} do {{$event->endDate}}</li>
                        @empty
                            <li> Još ne postoji niti jedan događaj. </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
