<?php

namespace App\Http\Controllers\Api;

use App\Appointment;
use App\Http\Controllers\Controller;
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
}
