<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'payment_type_name' => 'bca',
            'payment_type_logo' => 'payment-type/bca'
        ]);

        PaymentType::create([
            'payment_type_name' => 'bni',
            'payment_type_logo' => 'payment-type/bni'
        ]);

        PaymentType::create([
            'payment_type_name' => 'bri',
            'payment_type_logo' => 'payment-type/bri'
        ]);

        PaymentType::create([
            'payment_type_name' => 'dana',
            'payment_type_logo' => 'payment-type/dana'
        ]);

        PaymentType::create([
            'payment_type_name' => 'gopay',
            'payment_type_logo' => 'payment-type/gopay'
        ]);

        PaymentType::create([
            'payment_type_name' => 'ovo',
            'payment_type_logo' => 'payment-type/ovo'
        ]);
    }
}
