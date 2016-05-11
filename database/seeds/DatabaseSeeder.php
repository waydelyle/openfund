<?php use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaymentStatusSeeder::class);
        $this->call(CampaignCategoriesSeeder::class);
        $this->call(CampaignStatusSeeder::class);
        $this->call(RecordStatusSeeder::class);
    }
}
