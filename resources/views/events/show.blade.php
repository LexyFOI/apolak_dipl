@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">
        <h1 class="mr-auto"> <a class="no-underline" href="/events"> Događaji </a> / {{$event->event_name}}</h1>
    </header>

    <main>
        <div class="flex flex-wrap -m-3">
            {{--lijevi prozor sa listom i dodavanjem sudionika--}}
            <div class="lg:w-2/3">
                <h3 class="text-lg text-grey font-normal py-4">Popis prijava/uplata</h3>
                <div class="bg-white p-4 mb-2 rounded-lg shadow">
                    <div class="py-4">
                        {{--payments--}}
                        <table class="shadow-lg bg-white">
                            <thead>
                                <tr>
                                    <th class="bg-blue-100 border text-left px-8 py-4">Ime i prezime</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4">email</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4">godina/smjer</th>
                                    @if($event->payment == 1)
                                        <th class="bg-blue-100 border text-left px-8 py-4">plaćeno</th> {{--vidljivo ako je dog označen za plaćanje--}}
                                    @endif
                                    <th class="bg-blue-100 border text-left px-8 py-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($event->payments as $payment)
                                    @foreach($student_data as $participant)
                                        @if($payment->student_id == $participant->id)
                                            <form method="post" action="{{$event->path().'/payments/'.$payment->id}}">
                                                @method('patch')
                                                @csrf
                                                <tr class="hover:bg-blue">
                                                    <td class="border px-8 py-4">
                                                        {{$payment->student_id}} {{$participant->student_name}} {{$participant->student_last_name}}
                                                    </td>
                                                    <td class="border px-8 py-4">
                                                        {{$participant->email}}
                                                    </td>
                                                    <td class="border px-8 py-4">
                                                        {{--$course->course_id--}} 2. EP
                                                    </td>
                                                    <td class="border px-8 py-4">

                                                        <label class="flex items-center">
                                                            <input type="checkbox" name="paid" onchange="this.form.submit()" {{ $event->paid ? 'paid' :'' }}> {{--dodati onclick za update--}}
                                                        </label>
                                                    </td>
                                                    <td><a class="button bg-red btn-danger" >x</a></td> {{--link za brisanje zapisa--}}
                                                </tr>
                                            </form>
                                        @endif
                                    @endforeach
                                @empty
                                    <td colspan="4" class="border px-8 py-4"><p>Još nema evidentiranih prijava i uplata.</p></td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{--forma za odabir studenta--}}
                    <div class="flex flex-wrap bg-white w-full p-4 mb-5 rounded-lg shadow">
                        <form method="post" action="{{$event->path().'/payments'}}" >
                            @csrf
                            <h3 class="text-lg text-grey font-normal py-4">Dodavanje sudionika</h3>

                                <option placeholder="id studenta.." name="student_id" list="student_id" />
                                  <select name="student_id">
                                    @forelse($student_data as $student_row)
                                        <option value="{{$student_row->id}}">{{$student_row->student_name}} {{$student_row->student_last_name}} - {{$student_row->oib}} - {{$student_row->email}}</option>
                                    @empty
                                    @endforelse
                               </select>

                            <button type="submit" class="button">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>

            {{--desni prozor sa detaljima o dogadaju--}}
            <div class="lg:w-1/3 px-3">
                <h3 class="text-lg text-grey font-normal py-3">Detalji događaja</h3>
                <div class="flex flex-wrap bg-white p-4 mb-2 rounded-lg shadow">
                    <div>
                        <div class="py-2">Početak: {{$event->startDate}}</div>
                        <div class="py-2">Kraj: {{$event->endDate}}</div>
                        <div class="py-2">Plaćanje:
                            @if($event->payment == 0)
                                Ne
                            @elseif($event->payment == 1)
                                Da
                            @endif
                        </div>
                        <div class="py-2">Cijena za sudjelovanje: {{$event->price}}</div>
                        <div class="py-2">Dodatni bodovi: {{$event->event_points}}</div>
                        <div class="py-2">Opis događaja: {{$event->event_description}}</div>
                    </div>

                    <div>
                        <div class="float-right py-3 "><a href="/events" class="button">Ažuriraj</a></div>
                    </div>

                </div>
            </div>

        </div>
    </main>

@endsection
