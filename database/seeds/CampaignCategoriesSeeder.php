<?php use Illuminate\Database\Seeder;

class CampaignCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_categories')->insert([
            'slug' => 'art',
            'label' => 'Art',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'comics',
            'label' => 'Comics',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'crafts',
            'label' => 'Crafts',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'dance',
            'label' => 'Dance',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'design',
            'label' => 'Design',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'fashion',
            'label' => 'Fashion',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'film-and-video',
            'label' => 'Film & Video',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'food',
            'label' => 'Food',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'games',
            'label' => 'Games',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'journalism',
            'label' => 'Journalism',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'music',
            'label' => 'Music',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'photography',
            'label' => 'Photography',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'publishing',
            'label' => 'Publishing',
            'record_status_id' => 1,
        ]);

        DB::table('campaign_categories')->insert([
            'slug' => 'technology',
            'label' => 'Technology',
            'record_status_id' => 1,
        ]);
    }
}