<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PaymentEvidence;
use App\Models\Student;
use Illuminate\Http\Request;

class EventPaymentsController extends Controller
{
    public function store(Event $event){
        request()->validate([
            'student_id' => 'required'
        ]);
        $event->addStudent(request('student_id'));
        return redirect($event->path());
    }

    public function update(Event $event, PaymentEvidence $paymentEvidence){
        $paymentEvidence->update([
            'paid' => request()->has('paid')
        ]);

        return redirect(($event->path()));
    }
}





