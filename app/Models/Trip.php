<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Trip
 * 
 * @property int $id
 * @property int $bus_id
 * @property int $route_id
 * @property string $trip_code
 * @property Carbon $departure_date
 * @property Carbon $departure_time
 * @property Carbon $arrival_time
 * @property string|null $boarding_point
 * @property string|null $dropping_point
 * @property int $available_seats
 * @property float $price
 * @property string $status
 * @property string $bus_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Bus $bus
 * @property Route $route
 * @property Collection|Booking[] $bookings
 * @property Collection|SeatLock[] $seat_locks
 * @property Collection|TripStop[] $trip_stops
 *
 * @package App\Models
 */
class Trip extends Model
{
	protected $table = 'trips';

	protected $casts = [
		'bus_id' => 'int',
		'route_id' => 'int',
		'departure_date' => 'datetime',
		'departure_time' => 'datetime',
		'arrival_time' => 'datetime',
		'available_seats' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'bus_id',
		'route_id',
		'trip_code',
		'departure_date',
		'departure_time',
		'arrival_time',
		'boarding_point',
		'dropping_point',
		'available_seats',
		'price',
		'status',
		'bus_status'
	];

	public function bus()
	{
		return $this->belongsTo(Bus::class);
	}

	public function route()
	{
		return $this->belongsTo(Route::class);
	}

	public function bookings()
	{
		return $this->hasMany(Booking::class);
	}

	public function seat_locks()
	{
		return $this->hasMany(SeatLock::class);
	}

	public function trip_stops()
	{
		return $this->hasMany(TripStop::class);
	}
}
