<?php

namespace Tests\Feature\app\Http\Controllers\Bookings;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingsControllerTest extends TestCase
{

    public function testCreateBookingWithAllDataWait200Code()
    {
        $request =
            [
                'reserveId' => '125',
                'date_beging_reservation' => '30-10-2022 13:49:00',
                'date_ending_reservation' => '30-10-2022 18:00:00',
                'parking_id' => '15',
                'vehicle_registration_number' => '6358YUT'
            ];

        $response = $this->post('api/bookings', $request);

        $response->assertStatus(200);
    }

    public function testCreateBookingWithAllDataWait422Code()
    {
        $request =
            [
                'reserveId' => '125',
                'date_beging_reservation' => '30-10-2022 13:49:00',
                'date_ending_reservation' => '30-10-2022 18:00:00',
                'parking_id' => '15',
                'vehicle_registration_number' => '6358YUT'
            ];

        $response = $this->post('api/bookings', $request);

        $response->assertStatus(422);
    }

    public function testBookingListWait200Code()
    {

        $response = $this->get('api/bookings/125');

        $response->assertStatus(200);
    }
}
