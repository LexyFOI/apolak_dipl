@extends('layouts.app')

@section('content')

    <div class="w-25 bg-white p-4 rounded shadow">
        <h1 class="mb-4" style="font-family: 'Times New Roman'; text-align: center">Dobrodošli na FOI-TZK aplikaciju  </h1>
        <h2 class="mb-8" style="text-align: center">  - evidencija dolazaka studenta na nastavu iz tjelesnog - </h2>

        <br/>
        <br/>
        @if (Route::has('login'))
        <h3>Za pristup aplikaciji potrebno je obaviti registraciju.</h3>
        @endif
    </div>

    <div>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/events') }}" class="text-sm text-gray-700 underline">Događaji</a>
                    <a href="{{ url('/students') }}" class="text-sm text-gray-700 underline">Studenti</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endif
            </div>
        @endif
    </div>
@endsection
