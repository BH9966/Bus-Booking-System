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
 * @property int $company_id
 * @property string $bus_number
 * @property string $plate_number
 * @property string|null $model
 * @property string $bus_type
 * @property int $capacity
 * @property string $bus_status
 * @property string|null $image
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $bus_name
 * 
 * @property Company $company
 * @property User $user
 * @property Collection|Seat[] $seats
 * @property Collection|Trip[] $trips
 *
 * @package App\Models
 */
class Bus extends Model
{
	protected $table = 'buses';

	protected $casts = [
		'company_id' => 'int',
		'capacity' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'company_id',
		'bus_number',
		'plate_number',
		'model',
		'bus_type',
		'capacity',
		'bus_status',
		'image',
		'created_by',
		'bus_name'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function creator()
	{
		return $this->belongsTo(User::class, 'created_by');
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
