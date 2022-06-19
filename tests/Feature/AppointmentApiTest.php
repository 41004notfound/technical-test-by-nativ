<?php

namespace Tests\Feature;

use Tests\TestCase;

class AppointmentApiTest extends TestCase
{
    /**
     * Check if appointment's API listing endpoint returns 200 http.
     *
     * @return void
     */
    public function testAppointmentApiListing()
    {
        $response = $this->get('/api/appointments');

        $response->assertStatus(200);
    }
}
