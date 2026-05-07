<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bus
 * 
 * @property int $id
 * @property int $operator_id
 * @property string $bus_number
 * @property string $plate_number
 * @property string|null $model
 * @property string $bus_type
 * @property int $capacity
 * @property string $bus_status
 * @property string|null $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Operator $operator
 * @property Collection|Seat[] $seats
 * @property Collection|Trip[] $trips
 *
 * @package App\Models
 */
class Bus extends Model
{
	protected $table = 'buses';

	protected $casts = [
		'operator_id' => 'int',
		'capacity' => 'int'
	];

	protected $fillable = [
		'operator_id',
		'bus_number',
		'plate_number',
		'model',
		'bus_type',
		'capacity',
		'bus_status',
		'image'
	];

	public function operator()
	{
		return $this->belongsTo(Operator::class);
	}

	public function seats()
	{
		return $this->hasMany(Seat::class);
	}

	public function trips()
	{
		return $this->hasMany(Trip::class);
	}
}
