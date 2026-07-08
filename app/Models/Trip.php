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
 * @property int $company_id
 * @property int $bus_id
 * @property int $route_id
 * @property string $trip_code
 * @property Carbon $departure_date
 * @property Carbon $departure_time
 * @property Carbon $arrival_time
 * @property int $available_seats
 * @property float $price
 * @property string $status
 * @property string $bus_status
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $boarding_point_id
 * @property int|null $dropping_point_id
 *
 * @property Location|null $location
 * @property Bus $bus
 * @property Company $company
 * @property User $user
 * @property Route $route
 * @property Collection|Booking[] $bookings
 * @property Collection|SeatLock[] $seat_locks
 * @property Collection|Seat[] $seats
 * @property Collection|TripStop[] $trip_stops
 *
 * @package App\Models
 */
class Trip extends Model
{
	protected $table = 'trips';

	protected $casts = [
		'company_id' => 'int',
		'bus_id' => 'int',
		'route_id' => 'int',
		'departure_date' => 'datetime',
		'departure_time' => 'datetime',
		'arrival_time' => 'datetime',
		'available_seats' => 'int',
		'price' => 'float',
		'created_by' => 'int',
		'boarding_point_id' => 'int',
		'dropping_point_id' => 'int'
	];

	protected $fillable = [
		'company_id',
		'bus_id',
		'route_id',
		'trip_code',
		'departure_date',
		'departure_time',
		'arrival_time',
		'available_seats',
		'price',
		'status',
		'bus_status',
		'created_by',
		'boarding_point_id',
		'dropping_point_id'
	];

	public function location()
	{
		return $this->belongsTo(Location::class, 'dropping_point_id');
	}

	public function bus()
	{
		return $this->belongsTo(Bus::class);
	}

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function creator()
	{
		return $this->belongsTo(User::class, 'created_by');
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

	public function seats()
	{
		return $this->belongsToMany(Seat::class, 'trip_seats')
					->withPivot('id', 'is_booked', 'booked_by')
					->withTimestamps();
	}

	public function trip_stops()
	{
		return $this->hasMany(TripStop::class);
	}

        public function boardingPoint()
    {
        return $this->belongsTo(Location::class, 'boarding_point_id');
    }

    public function droppingPoint()
    {
        return $this->belongsTo(Location::class, 'dropping_point_id');
    }

}
