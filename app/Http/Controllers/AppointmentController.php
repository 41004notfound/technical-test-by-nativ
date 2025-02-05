<?php

namespace App\Http\Controllers;

use App\Appointment;

class AppointmentController extends Controller
{
    /**
     * Show Appointment's listing page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('appointments.index');
    }

    /**
     * Show Appointment's creating form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Show Appointment detail's page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', [
            'appointment' => $appointment
        ]);
    }
}
