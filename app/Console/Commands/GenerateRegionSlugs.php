<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Region;
use Illuminate\Support\Str;

class GenerateRegionSlugs extends Command
{
    protected $signature = 'regions:slug';

    protected $description = 'Generate slugs for existing regions';

    public function handle()
    {
        foreach (Region::all() as $region) {

            $slug = Str::slug($region->name);

            $count = Region::where('slug', 'LIKE', "{$slug}%")
                ->where('id', '!=', $region->id)
                ->count();

            $region->slug = $count
                ? "{$slug}-".($count + 1)
                : $slug;

            $region->saveQuietly();
        }

        $this->info('Region slugs generated successfully.');
    }
}