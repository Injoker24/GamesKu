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
            'payment_type_name' => 'BVA',
            'payment_type_logo' => 'paymentasset\Method BCA'
        ]);

        PaymentType::create([
            'payment_type_name' => 'BNI',
            'payment_type_logo' => 'paymentasset\Method BNI'
        ]);

        PaymentType::create([
            'payment_type_name' => 'BRI',
            'payment_type_logo' => 'paymentasset\Method BRI'
        ]);

        PaymentType::create([
            'payment_type_name' => 'Dana',
            'payment_type_logo' => 'paymentasset\Method Dana'
        ]);

        PaymentType::create([
            'payment_type_name' => 'Gopay',
            'payment_type_logo' => 'paymentasset\Method Gopay'
        ]);

        PaymentType::create([
            'payment_type_name' => 'Ovo',
            'payment_type_logo' => 'paymentasset\Method Ovo'
        ]);
    }
}
