<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 30/10/2022
 * Time: 10:15 AM
 */

namespace parkimetertest\Clases\Booking\Persistencia;


use Illuminate\Support\Facades\Log;
use parkimetertest\Models\Booking;

class BookingPer
{
    public function CreateBooking($request)
    {
        $message = "";

        /*Save booking information in Booking model*/
        try
        {
            $booking = new Booking();
            $booking->reserveId = $request->reserveId;
            $booking->date_beging_reservation = Booking::ConvertFormatDateCarbon($request->date_beging_reservation);
            $booking->date_ending_reservation = Booking::ConvertFormatDateCarbon($request->date_ending_reservation);
            $booking->parking_id = $request->parking_id;
            $booking->vehicle_registration_number = $request->vehicle_registration_number;
            $booking->save();

            return $message;

        } catch (\Exception $e)
        {
            Log::info('Error in Create Booking: '.$e->getMessage());
            return $message = "Exist a error in Create Booking, please check the log files";
        }

    }

    public function BookingList($reserveId)
    {
        $message = "";
        $result = "";

        try
        {
            $bookingList = Booking::where('reserveId','=',$reserveId)
                ->first();

            if($bookingList!==null)
            {
                $result =
                    [
                        'status' => 200,
                        'bookingresult' =>
                            [
                                'reserveId' => $bookingList->reserveId,
                                'date_beging_reservation' => Booking::ConvertFormatDateCarbonNotISO($bookingList->date_beging_reservation),
                                'date_ending_reservation' => Booking::ConvertFormatDateCarbonNotISO($bookingList->date_ending_reservation),
                                'parking_id' => $bookingList->parking_id,
                                'vehicle_registration_number' => $bookingList->vehicle_registration_number,
                            ]
                    ];
            }
            else
            {
                $result =
                    [
                        'status' => 200,
                        'bookingresult' =>
                            [
                                'message' => "Don't exist a booking with this reserve number"
                            ]
                    ];
            }


            return $result;

        } catch (\Exception $e)
        {
            Log::info('Error in Booking List: '.$e->getMessage());
            $result =
                [
                    'message' => 'Exist a error in Booking List, please check the log files',
                    'status' => 422,
                ];
            return $result;
        }
    }

}