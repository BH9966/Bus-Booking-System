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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Route[] $routes
 * @property Collection|TripStop[] $trip_stops
 *
 * @package App\Models
 */
class Location extends Model
{
	protected $table = 'locations';

	protected $fillable = [
		'name',
		'city',
		'status'
	];

	public function routes()
	{
		return $this->hasMany(Route::class, 'to_station_id');
	}

	public function trip_stops()
	{
		return $this->hasMany(TripStop::class, 'station_id');
	}
}
