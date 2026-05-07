<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Passenger
 * 
 * @property int $id
 * @property int $booking_id
 * @property int $seat_id
 * @property string $full_name
 * @property string $phone
 * @property string|null $gender
 * @property string|null $national_id
 * @property string|null $emergency_contact
 * @property int|null $age
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Booking $booking
 * @property Seat $seat
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Passenger extends Model
{
	protected $table = 'passengers';

	protected $casts = [
		'booking_id' => 'int',
		'seat_id' => 'int',
		'age' => 'int'
	];

	protected $fillable = [
		'booking_id',
		'seat_id',
		'full_name',
		'phone',
		'gender',
		'national_id',
		'emergency_contact',
		'age'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function seat()
	{
		return $this->belongsTo(Seat::class);
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
