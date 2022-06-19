<?php

namespace Tests\Feature;

use App\Appointment;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    /**
     * Check if appointment's create page returns 200 http.
     *
     * @return void
     */
    public function testAppointmentCreatePage()
    {
        $response = $this->get(route('appointments.create'));

        $response->assertStatus(200);
    }

    /**
     * Check if appointment's show page returns 200 http if exit, 404 if not.
     *
     * @return void
     */
    public function testAppointmentShowPage()
    {
        $lastAppointment = Appointment::query()->latest()->first();

        $response = $this->get(route('appointments.show', $lastAppointment ?? 1));

        $response->assertStatus($lastAppointment ? 200 : 404);
    }

    public function testAppointmentCreateRequest()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('api-front/appointments', [
            'name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '0612345678',
            'appointment_date' => '2022-01-01 12:00:00',
            'localTZ' => 'Europe/Paris'
        ]);

        $response->assertStatus(200);
    }
}
