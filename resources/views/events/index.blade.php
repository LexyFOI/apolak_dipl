@extends('layouts.app')

@section('content')

                <header class="flex items-center mb-3 py-4">
                    <h1 class="mr-auto">Događaji</h1>
                    <a href="/events/create" class="button">Kreiraj novi</a>
                </header>

                <main class="lg:flex flex-wrap ">
                    @forelse($events as $event)
                        <div class= "lg:w-1/2 px-3 pb-3">
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h3 class="font-normal text-xl py-4">
                                    <a href="{{ $event->path() }}"> {{ $event->event_name}} </a>
                                </h3>
                                <div class="text-grey"> traje od {{$event->startDate}} do {{$event->endDate}}</div>
                            </div>
                        </div>
                    @empty
                        <div> Još ne postoji niti jedan događaj.  </div>
                    @endforelse
                </main>

@endsection
