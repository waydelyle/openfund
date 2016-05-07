<?php

use Illuminate\Database\Seeder;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_statuses')->insert([
            'slug' => 'pending',
            'label' => 'Pending',
            'record_status_id' => 1,
        ]);

        DB::table('project_statuses')->insert([
            'slug' => 'accepted',
            'label' => 'Accepted',
            'record_status_id' => 1,
        ]);

        DB::table('project_statuses')->insert([
            'slug' => 'rejected',
            'label' => 'Rejected',
            'record_status_id' => 1,
        ]);

        DB::table('project_statuses')->insert([
            'slug' => 'funded',
            'label' => 'Funded',
            'record_status_id' => 1,
        ]);

        DB::table('project_statuses')->insert([
            'slug' => 'not-funded',
            'label' => 'Not Funded',
            'record_status_id' => 1,
        ]);

        DB::table('project_statuses')->insert([
            'slug' => 'featured',
            'label' => 'Featured',
            'record_status_id' => 1,
        ]);

    }
}
