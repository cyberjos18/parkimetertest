<?php

namespace parkimetertest\Http\Controllers\Bookings;

use Illuminate\Http\Request;
use parkimetertest\Clases\Booking\Persistencia\BookingPer;
use parkimetertest\Clases\Booking\Validations\BookingValidations;
use parkimetertest\Http\Controllers\Controller;


class BookingsController extends Controller

{

    public function CreateBooking(Request $request)
    {

        $bookingValidations = new BookingValidations();
        $bookingPer = new BookingPer();

        /*Apply validations*/
        $errors = $bookingValidations->ValidateBooking($request,"1");

        if ($errors)
        {
            return response()->json
            ([
                'errors' => $errors
            ],422);
        }
        else
        {

            $result=$bookingPer->CreateBooking($request);

            if($result=="")
            {
                return response()->json
                ([
                    'status' => 'ok'
                ], 200);
            }
            else
            {
                return response()->json
                ([
                    'errors' => $result
                ], 422);
            }
        }

    }

    public function BookingList($request)
    {
        $bookingValidations = new BookingValidations();
        $bookingPer = new BookingPer();

        /*Apply validations*/
        $errors = $bookingValidations->ValidateBooking($request,"2");

        if ($errors)
        {
            return response()->json
            ([
                'errors' => $errors
            ],422);
        }
        else
        {
            $result = $bookingPer->BookingList($request);


            if($result['status']==200)
            {

                return response()->json
                ([
                    'status' => 'ok',
                    'bookingresult' => $result['bookingresult']

                ], 200);
            }
            else
            {
                return response()->json
                ([
                    'errors' => $result
                ], 422);
            }
        }
    }
}
