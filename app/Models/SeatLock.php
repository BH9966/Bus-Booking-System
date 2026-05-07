<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SeatLock
 * 
 * @property int $id
 * @property int $seat_id
 * @property int $trip_id
 * @property int|null $user_id
 * @property string|null $session_id
 * @property Carbon $locked_until
 * @property string|null $ip_address
 * @property string|null $device_info
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Seat $seat
 * @property Trip $trip
 * @property User|null $user
 *
 * @package App\Models
 */
class SeatLock extends Model
{
	protected $table = 'seat_locks';

	protected $casts = [
		'seat_id' => 'int',
		'trip_id' => 'int',
		'user_id' => 'int',
		'locked_until' => 'datetime'
	];

	protected $fillable = [
		'seat_id',
		'trip_id',
		'user_id',
		'session_id',
		'locked_until',
		'ip_address',
		'device_info',
		'status'
	];

	public function seat()
	{
		return $this->belongsTo(Seat::class);
	}

	public function trip()
	{
		return $this->belongsTo(Trip::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
