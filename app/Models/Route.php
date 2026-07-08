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
 * @property int|null $company_id
 * @property int $from_region_id
 * @property int $to_region_id
 * @property float $distance_km
 * @property int|null $estimated_duration
 * @property string $status
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
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
		'distance_km' => 'float',
		'created_by' => 'int'
	];

	protected $fillable = [
        'company_id',
		'from_region_id',
        'to_region_id',
		'distance_km',
		'estimated_duration',
		'status',
		'created_by'
	];

	public function creator()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

    public function fromRegion()
    {
        return $this->belongsTo(Region::class, 'from_region_id');
    }

    public function toRegion()
    {
        return $this->belongsTo(Region::class, 'to_region_id');
    }

	  public function fromLocation()
    {
         return $this->belongsTo(Location::class, 'from_station_id');
    }

    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to_station_id');
    }
	// public function location()
	// {
	// 	return $this->belongsTo(Location::class, 'to_station_id');
	// }


	public function trips()
	{
		return $this->hasMany(Trip::class);
	}
}
