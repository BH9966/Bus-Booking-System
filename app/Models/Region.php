<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 *
 * @property int $id
 * @property int|null $company_id

 * @property string $name
 * @property int $created_by
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at

 *
 * @property User $user
 *@property Location $location
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'regions';

	 protected $casts = [
	'created_by' => 'int',
	'company_id' => 'int',
	 ];

	protected $fillable = [
        'company_id',
		'name',
		'status',
		'created_by'
	];
     public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
     public function routesFrom()
    {
        return $this->hasMany(Route::class, 'from_region_id');
    }

    public function routesTo()
    {
        return $this->hasMany(Route::class, 'to_region_id');
    }

}
