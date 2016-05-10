v<?php

use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_statuses')->insert([
            'id' => 1,
            'slug' => 'pending',
            'label' => 'Pending',
            'record_status_id' => 1,
        ]);

        DB::table('payment_statuses')->insert([
            'id' => 2,
            'slug' => 'successful',
            'label' => 'Successful',
            'record_status_id' => 1,
        ]);

        DB::table('payment_statuses')->insert([
            'id' => 3,
            'slug' => 'failed',
            'label' => 'Failed',
            'record_status_id' => 1,
        ]);
    }
}
