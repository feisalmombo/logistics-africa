<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project();
        $project->project_name = 'Project A';
        $project->save();

        $project = new Project();
        $project->project_name = 'Project B';
        $project->save();

        $project = new Project();
        $project->project_name = 'Project C';
        $project->save();

        $project = new Project();
        $project->project_name = 'Project D';
        $project->save();
    }
}
