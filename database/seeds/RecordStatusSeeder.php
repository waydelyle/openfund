<?php use Illuminate\Database\Seeder;

class RecordStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('record_statuses')->insert([
            'id' => 1,
            'slug' => 'active',
            'label' => 'Active'
        ]);

        DB::table('record_statuses')->insert([
            'id' => 2,
            'slug' => 'not-active',
            'label' => 'Not Active'
        ]);

    }
}
