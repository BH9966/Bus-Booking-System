<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 * 
 * @property int $id
 * @property int $booking_id
 * @property int $passenger_id
 * @property int $seat_id
 * @property string $ticket_number
 * @property string|null $qr_code
 * @property string $ticket_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Booking $booking
 * @property Passenger $passenger
 * @property Seat $seat
 *
 * @package App\Models
 */
class Ticket extends Model
{
	protected $table = 'tickets';

	protected $casts = [
		'booking_id' => 'int',
		'passenger_id' => 'int',
		'seat_id' => 'int'
	];

	protected $fillable = [
		'booking_id',
		'passenger_id',
		'seat_id',
		'ticket_number',
		'qr_code',
		'ticket_status'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function passenger()
	{
		return $this->belongsTo(Passenger::class);
	}

	public function seat()
	{
		return $this->belongsTo(Seat::class);
	}
}
