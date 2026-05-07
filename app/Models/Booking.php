<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 * 
 * @property int $id
 * @property int $user_id
 * @property int $trip_id
 * @property string $booking_code
 * @property float $total_amount
 * @property string $status
 * @property string $payment_status
 * @property string $booking_source
 * @property string|null $qr_code
 * @property Carbon|null $booked_at
 * @property Carbon|null $cancelled_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Trip $trip
 * @property User $user
 * @property Collection|BookedSeat[] $booked_seats
 * @property Collection|Passenger[] $passengers
 * @property Collection|Payment[] $payments
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Booking extends Model
{
	protected $table = 'bookings';

	protected $casts = [
		'user_id' => 'int',
		'trip_id' => 'int',
		'total_amount' => 'float',
		'booked_at' => 'datetime',
		'cancelled_at' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'trip_id',
		'booking_code',
		'total_amount',
		'status',
		'payment_status',
		'booking_source',
		'qr_code',
		'booked_at',
		'cancelled_at'
	];

	public function trip()
	{
		return $this->belongsTo(Trip::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function booked_seats()
	{
		return $this->hasMany(BookedSeat::class);
	}

	public function passengers()
	{
		return $this->hasMany(Passenger::class);
	}

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
