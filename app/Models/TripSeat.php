<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TripSeat
 * 
 * @property int $id
 * @property int $trip_id
 * @property int $seat_id
 * @property bool $is_booked
 * @property int|null $booked_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Seat $seat
 * @property Trip $trip
 *
 * @package App\Models
 */
class TripSeat extends Model
{
	protected $table = 'trip_seats';

	protected $casts = [
		'trip_id' => 'int',
		'seat_id' => 'int',
		'is_booked' => 'bool',
		'booked_by' => 'int'
	];

	protected $fillable = [
		'trip_id',
		'seat_id',
		'is_booked',
		'booked_by'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'booked_by');
	}

	public function seat()
	{
		return $this->belongsTo(Seat::class);
	}

	public function trip()
	{
		return $this->belongsTo(Trip::class);
	}
}
