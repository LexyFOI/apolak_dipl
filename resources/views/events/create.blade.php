@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <h1 class="mr-auto"> <a class="no-underline" href="/events"> Događaji </a> / Kreiranje novog događaja</h1>
    </header>

    <main>

        <div class="bg-white p-4 mb-5 rounded-lg shadow">
            <form type="POST" action="/events">
                @csrf
                {{--naziv--}}
                <div class="flex flex-wrap field py-3">
                    <label class="label py-2" for="event_name">Naziv događaja: </label>
                    <div class="bg-white p-4 rounded-lg shadow w-full">
                        <input type="text" class="input w-full" name="event_name" placeholder="Naziv događaja">
                    </div>
                </div>
                    {{--pocetak i kraj--}}
                <div class="flex flex-wrap field py-3">
                    <div class="bg-white p-4 rounded-lg shadow mr-6">
                        <label class="label" for="startDate">Datum početka:</label>
                        <input type="date" class="input" name="startDate" placeholder="Datum početka">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow mr-6">
                        <label class="label" for="endDate">Datum završetka:</label>
                        <input type="date" class="input" name="endDate" placeholder="Datum završetka">
                    </div>
                </div>
                    {{--cijena i placanje--}}
                <div class="flex flex-wrap field py-4 lg:w-1/2">
                    <div class="bg-white p-4  rounded-lg shadow mr-6">
                        <label for="payment">Događaj se plaća:</label>
                        <select name="payment" id="payment">
                            <option value="0">Ne</option>
                            <option value="1">Da</option>
                        </select>
                    </div>
                  {{--  @if( == 1) --}}
                    <div class="bg-white p-4 rounded-lg shadow lg:w-1/2">
                        <input type="number" class="input" name="price" placeholder="Cijena (kn)">
                    </div>
                  {{--  @endif--}}
                </div>

                {{--Bodovi--}}
                <div class="bg-white p-4 rounded-lg shadow mb-5">
                    <label for="payment">Dodatni bodovi:</label>
                    <input type="number" class="input" name="event_points" placeholder="Dodatni bodovi"/>
                </div>

                {{--opis dogadaja--}}
                <div>
                    <label for="payment" class="align-top py-4">Opis događaja:</label>
                    <div class="bg-white p-4 rounded-lg shadow py-3">
                        <textarea class="w-full" name = "event_description" placeholder="Opis događaja"></textarea>
                    </div>
                </div>

                <button type="submit" class="button is-link" > Kreiraj </button>

            </form>

        </div>
    </main>

@endsection
