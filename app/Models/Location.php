<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * 
 * @property int $id
 * @property string $name
 * @property string $city
 * @property string $status
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Route[] $routes
 * @property Collection|TripStop[] $trip_stops
 * @property Collection|Trip[] $trips
 *
 * @package App\Models
 */
class Location extends Model
{
	protected $table = 'locations';

	protected $casts = [
		'created_by' => 'int'
	];

	protected $fillable = [
		'name',
		'city',
		'status',
		'created_by'
	];

	public function creator()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function routes()
	{
		return $this->hasMany(Route::class, 'to_station_id');
	}

	public function trip_stops()
	{
		return $this->hasMany(TripStop::class, 'station_id');
	}

	public function trips()
	{
		return $this->hasMany(Trip::class, 'dropping_point_id');
	}
}
