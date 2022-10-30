<?php

namespace Tests\Unit\app\Clases\Booking\Validations;

use parkimetertest\Clases\Booking\Validations\BookingValidations;
use parkimetertest\Models\Booking;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingValidationsTest extends TestCase
{

    public function testValidateBookingUsingPostWithAllDatas()
    {
        $request =
            [
              'reserveId' => '123',
              'date_beging_reservation' => '30-10-2022 13:49:00',
              'date_ending_reservation' => '30-10-2022 18:00:00',
              'parking_id' => '15',
              'vehicle_registration_number' => '6358YUT'
            ];

        $requestWithOutObj = json_encode($request);
        $requestObj = json_decode($requestWithOutObj);


        $validate  = new BookingValidations();
        $response=$validate->ValidateBooking($requestObj,1);


        $this->assertEquals("",$response);

    }

    public function testValidateBookingUsingPostWithoutAllDatas()
    {
        $request =
            [
                'reserveId' => '',
                'date_beging_reservation' => '30-10-2022 13:49:00',
                'date_ending_reservation' => '30-10-2022 18:00:00',
                'parking_id' => '15',
                'vehicle_registration_number' => '6358YUT'
            ];

        $requestWithOutObj = json_encode($request);
        $requestObj = json_decode($requestWithOutObj);


        $validate  = new BookingValidations();
        $response=$validate->ValidateBooking($requestObj,1);

        $this->assertNotNull($response);

    }

    public function testValidateBookingUsingGetWithAllDataForListResult()
    {
        $request =
            [
                'reserveId' => '123',
            ];

        $requestWithOutObj = json_encode($request);
        $requestObj = json_decode($requestWithOutObj);


        $validate  = new BookingValidations();
        $response=$validate->ValidateBooking($requestObj,2);


        $this->assertEquals("",$response);

    }
}
