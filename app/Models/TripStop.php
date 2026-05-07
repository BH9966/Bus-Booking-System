<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TripStop
 * 
 * @property int $id
 * @property int $trip_id
 * @property int $station_id
 * @property Carbon|null $arrival_time
 * @property Carbon|null $departure_time
 * @property int $stop_order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Location $location
 * @property Trip $trip
 *
 * @package App\Models
 */
class TripStop extends Model
{
	protected $table = 'trip_stops';

	protected $casts = [
		'trip_id' => 'int',
		'station_id' => 'int',
		'arrival_time' => 'datetime',
		'departure_time' => 'datetime',
		'stop_order' => 'int'
	];

	protected $fillable = [
		'trip_id',
		'station_id',
		'arrival_time',
		'departure_time',
		'stop_order'
	];

	public function location()
	{
		return $this->belongsTo(Location::class, 'station_id');
	}

	public function trip()
	{
		return $this->belongsTo(Trip::class);
	}
}
