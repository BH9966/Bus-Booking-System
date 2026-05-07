<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seat
 * 
 * @property int $id
 * @property int $bus_id
 * @property string $seat_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Bus $bus
 * @property Collection|BookedSeat[] $booked_seats
 * @property Collection|Passenger[] $passengers
 * @property Collection|SeatLock[] $seat_locks
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Seat extends Model
{
	protected $table = 'seats';

	protected $casts = [
		'bus_id' => 'int'
	];

	protected $fillable = [
		'bus_id',
		'seat_number'
	];

	public function bus()
	{
		return $this->belongsTo(Bus::class);
	}

	public function booked_seats()
	{
		return $this->hasMany(BookedSeat::class);
	}

	public function passengers()
	{
		return $this->hasMany(Passenger::class);
	}

	public function seat_locks()
	{
		return $this->hasMany(SeatLock::class);
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
