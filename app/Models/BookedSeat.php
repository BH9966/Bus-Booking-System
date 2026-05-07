<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BookedSeat
 * 
 * @property int $id
 * @property int $booking_id
 * @property int $seat_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Booking $booking
 * @property Seat $seat
 *
 * @package App\Models
 */
class BookedSeat extends Model
{
	protected $table = 'booked_seats';

	protected $casts = [
		'booking_id' => 'int',
		'seat_id' => 'int'
	];

	protected $fillable = [
		'booking_id',
		'seat_id'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function seat()
	{
		return $this->belongsTo(Seat::class);
	}
}
