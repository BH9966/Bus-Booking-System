<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'slug',
		'status',
		'created_by'
	];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($region) {

            $slug = Str::slug($region->name);

            $count = Region::where('slug', 'LIKE', "{$slug}%")->count();

            $region->slug = $count
                ? "{$slug}-".($count + 1)
                : $slug;
        });

        static::updating(function ($region) {

            if ($region->isDirty('name')) {

                $slug = Str::slug($region->name);

                $count = Region::where('slug', 'LIKE', "{$slug}%")
                    ->where('id', '!=', $region->id)
                    ->count();

                $region->slug = $count
                    ? "{$slug}-".($count + 1)
                    : $slug;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

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
    // Inside app\Models\Region.php

public function fromRoutes()
{
    return $this->hasMany(Route::class, 'from_region_id');
}

public function toRoutes()
{
    return $this->hasMany(Route::class, 'to_region_id');
}
}
