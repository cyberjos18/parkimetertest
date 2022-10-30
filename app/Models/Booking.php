<?php

/**
 * Created by Reliese Model.
 */

namespace parkimetertest\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 * 
 * @property int $id
 * @property string $reserveId
 * @property Carbon $date_beging_reservation
 * @property Carbon $date_ending_reservation
 * @property int $parking_id
 * @property string $vehicle_registration_number
 *
 * @package App\Models
 */
class Booking extends Model
{
	protected $table = 'bookings';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'parking_id' => 'int'
	];

	protected $dates = [
		'date_beging_reservation',
		'date_ending_reservation'
	];

	protected $fillable = [
		'reserveId',
		'date_beging_reservation',
		'date_ending_reservation',
		'parking_id',
		'vehicle_registration_number'
	];

    public static function  ConvertFormatDateCarbon($date)
    {

        $newDate=Carbon::createFromFormat('d-m-Y H:i:s',$date)->toDateTimeString();
        return $newDate;
    }

    public static function  ConvertFormatDateCarbonNotISO($date)
    {

        $newDate=Carbon::parse($date)->format('d-m-Y H:i:s');
        return $newDate;
    }
}
