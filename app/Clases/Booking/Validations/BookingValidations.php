<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 30/10/2022
 * Time: 10:20 AM
 */

namespace parkimetertest\Clases\Booking\Validations;


use Illuminate\Support\Facades\Validator;
use parkimetertest\Models\Booking;

class BookingValidations
{
        public function ValidateBooking($request,$requestType)
        {
            /**
             * @param $request | In this case is all the data sending in the request
             * @param $requestType | This is for indicate the request type:
             *     1 is validate for create
             *     2 is validate for consulting
             */
            switch($requestType)
            {
                case '1':
                    $data = array
                    (
                        'reserveId' => $request->reserveId,
                        'date_beging_reservation' => Booking::ConvertFormatDateCarbon($request->date_beging_reservation),
                        'date_ending_reservation' => Booking::ConvertFormatDateCarbon($request->date_ending_reservation),
                        'parking_id' => $request->parking_id,
                        'vehicle_registration_number' => $request->vehicle_registration_number

                    );


                    $rules = array
                    (
                        'reserveId' => 'required|unique:bookings,reserveId',
                        'date_beging_reservation'   => 'required|date_format:Y-m-d H:i:s',
                        'date_ending_reservation'       => 'required|date_format:Y-m-d H:i:s',
                        'parking_id'  => 'required',
                        'vehicle_registration_number' => 'required'
                    );

                    $messages = array
                    (
                        'reserveId.required' => 'The number of reserve is required',
                        'reserveId.unique' => 'The number of reserve already exist please check again',
                        'date_beging_reservation.required' => 'The date beging reservation is required',
                        'date_beging_reservation.date_format' => 'The date beging reservation format must be YYYY-MM-DD H:i:s',
                        'date_ending_reservation.required' => 'The date ending reservation is required',
                        'date_ending_reservation.date_format' => 'The date ending reservation format must be YYYY-MM-DD H:i:s',
                        'parking_id.required' => 'The parking ID is required',
                        'vehicle_registration_number.required' => 'The vehicle registration number is required'
                    );

                    $v = Validator::make($data, $rules, $messages);


                    if ($v->fails())
                    {
                        return $v->errors();
                    }

                    break;
                case '2';

                    $data = array
                    (
                        'reserveId' => $request,
                    );


                    $rules = array
                    (
                        'reserveId' => 'required',
                    );

                    $messages = array
                    (
                        'reserveId.required' => 'The number of reserve is required',
                    );

                    $v = Validator::make($data, $rules, $messages);


                    if ($v->fails())
                    {
                        return $v->errors();
                    }

                    break;
            }

        }
}