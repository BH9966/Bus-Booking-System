<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Route
 * 
 * @property int $id
 * @property int $from_station_id
 * @property int $to_station_id
 * @property float $distance_km
 * @property string|null $estimated_duration
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Location $location
 * @property Collection|Trip[] $trips
 *
 * @package App\Models
 */
class Route extends Model
{
	protected $table = 'routes';

	protected $casts = [
		'from_station_id' => 'int',
		'to_station_id' => 'int',
		'distance_km' => 'float'
	];

	protected $fillable = [
		'from_station_id',
		'to_station_id',
		'distance_km',
		'estimated_duration',
		'status'
	];

	public function location()
	{
		return $this->belongsTo(Location::class, 'to_station_id');
	}

	public function trips()
	{
		return $this->hasMany(Trip::class);
	}
}
