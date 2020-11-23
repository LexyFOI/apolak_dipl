@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Detalji o događaju') }}</div>

                    <div class="card-body">
                        <h1>{{$event->event_name}}</h1>
                        <div>Početak: {{$event->startDate}}</div>
                        <div>Kraj: {{$event->endDate}}</div>
                        <div>Događaj se plaća:

                            @if ($event->payment == 0)
                               Ne
                            @endif
                            @if($event->payment == 1)
                                Da
                            @endif
                        </div>
                        <div>Cijena za sudjelovanje na događaju: {{$event->price}}</div>
                        <div>Dodatni bodovi za sudjelovanje: {{$event->event_points}}</div>
                        <div>Opis događaja: {{$event->event_description}}</div>
                    </div>
                    <div class="card-footer">
                        <div class="control">
                            <a href="/events">Povratak na listu događaja</a>
                            <button type="button" ><a href="/events">Ažuriraj podatke</a></button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
