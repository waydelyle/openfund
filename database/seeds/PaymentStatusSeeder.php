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
            'slug' => 'pending',
            'label' => 'Pending',
            'record_status_id' => 1,
        ]);

        DB::table('payment_statuses')->insert([
            'slug' => 'successful',
            'label' => 'Successful',
            'record_status_id' => 1,
        ]);

        DB::table('payment_statuses')->insert([
            'slug' => 'failed',
            'label' => 'Failed',
            'record_status_id' => 1,
        ]);
    }
}
