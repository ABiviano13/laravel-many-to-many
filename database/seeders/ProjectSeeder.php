<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type_ids = Type::all()->pluck('id')->all();

        for($i=0; $i < 100; $i++){

            $project = new Project();
            $project->title = $faker->unique()->sentence(4);
            $project->content = $faker->optional()->text(350);
            $project->slug = Str::slug($project->title, '-');
            $project->type_id = $faker->optional()->RandomElement($type_ids);

            $project->save();

        }
    }
}
