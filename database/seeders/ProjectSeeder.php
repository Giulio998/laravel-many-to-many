<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Technology;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        
        $types = Type::all();
        $types_ids = $types->pluck('id')->all();
        $technologies_ids = Technology::all()->pluck('id')->all();

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();

            $title = $faker-> sentence(6);
            $project->title = $title;
            $project->slug = Str::slug($title);
            $project->content = $faker->optional()->text(500);
            $project->type_id = $faker->randomElement($types_ids);
            $project->save();
            $project->technologies()->attach($faker->randomElements($technologies_ids,null));
    }
}
}