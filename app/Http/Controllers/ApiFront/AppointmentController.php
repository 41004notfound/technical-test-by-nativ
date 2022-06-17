<?php

namespace App\Http\Controllers\ApiFront;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiFront\Appointment\StoreAppointmentRequest;
use Illuminate\Http\JsonResponse;

class AppointmentController extends Controller
{
    /**
     * Return all Appointments for JSON format
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        /** @var Appointment $appointments */
        $appointments = Appointment::all();

        return response()->json($appointments);
    }

    /**
     * Store a new appointment
     *
     * @param  \App\Http\Requests\ApiFront\Appointment\StoreAppointmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAppointmentRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        /** @var Appointment $appointment */
        $appointment = Appointment::query()->create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message'],
            'appointment_date' => $validatedData['appointment_date']
        ]);

        return response()->json($appointment);
    }

    /**
     * Return Appointment's details for JSON format
     *
     * @param  \App\Appointment $appointment
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Appointment $appointment)
    {
        return response()->json($appointment);
    }
}
