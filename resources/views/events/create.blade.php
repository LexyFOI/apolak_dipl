@extends('layouts.app')

@section('content')
    <form method="post" action="/events"  class="container">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Kreiranje novog događaja') }}</div>

                    <div class="card-body">
                        <div class="card-text">
                            <label class="label" for="event_name">Naziv događaja</label>

                            <div class=control">
                                <input type="text" class="input" name="event_name" placeholder="Naziv događaja">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="startDate">Događaj počinje</label>

                            <div class="control">
                                <input type="date" class="input" name="startDate" placeholder="Događaj počinje">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="startDate">Događaj završava</label>

                            <div class="control">
                                <input type="date" class="input" name="endDate" placeholder="Događaj završava">
                            </div>
                        </div>

                        <div class="field">
                            <label for="payment">Događaj se plaća:</label>

                            <div class="control">
                                <select name="payment" id="payment">
                                    <option value="0">Ne</option>
                                    <option value="1">Da</option>
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="price">Cijena za sudjelovanje na događaju (kn)</label>

                            <div class="control">
                                <input type="number" class="input" name="price" placeholder="Cijena za sudjelovanje na događaju (kn)">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="event_points">Dodatni bodoci za sudjelovanje</label>

                            <div class="control">
                                <input type="number" class="input" name="event_points" placeholder="Dodatni bodovi za sudjelovanje">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="event_description">Opis događaja</label>

                            <div class="control">
                                <input type="text" class="input" name="event_description" placeholder="Opis događaja">
                            </div>
                        </div>
                    </div>
                        <div class="card-footer">

                                <button type="submit" class="btn-link">Kreiraj događaj</button>
                                <button class="btn-link"><a href="/events"> Odustani</a></button>

                        </div>

                </div>
            </div>
        </div>
    </form>
@endsection
