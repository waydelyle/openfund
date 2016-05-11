<?php use Illuminate\Database\Seeder;

class CampaignStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_statuses')->insert([
            'id' => 1,
            'slug' => 'pending',
            'label' => 'Pending',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_statuses')->insert([
            'id' => 2,
            'slug' => 'accepted',
            'label' => 'Accepted',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_statuses')->insert([
            'id' => 3,
            'slug' => 'rejected',
            'label' => 'Rejected',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_statuses')->insert([
            'id' => 4,
            'slug' => 'funded',
            'label' => 'Funded',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_statuses')->insert([
            'id' => 5,
            'slug' => 'not-funded',
            'label' => 'Not Funded',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_statuses')->insert([
            'id' => 6,
            'slug' => 'featured',
            'label' => 'Featured',
            'record_status_id' => 1,
        ]);

    }
}
