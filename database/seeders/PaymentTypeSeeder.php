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
            'payment_type_name' => 'BCA',
            'payment_type_logo' => '/paymentAsset/Method BCA.png'
        ]);

        PaymentType::create([
            'payment_type_name' => 'BNI',
            'payment_type_logo' => '/paymentAsset/Method BNI.png'
        ]);

        PaymentType::create([
            'payment_type_name' => 'BRI',
            'payment_type_logo' => '/paymentAsset/Method BRI.jpg'
        ]);

        PaymentType::create([
            'payment_type_name' => 'Dana',
            'payment_type_logo' => '/paymentAsset/Method Dana.png'
        ]);

        PaymentType::create([
            'payment_type_name' => 'Gopay',
            'payment_type_logo' => '/paymentAsset/Method Gopay.png'
        ]);

        PaymentType::create([
            'payment_type_name' => 'Ovo',
            'payment_type_logo' => '/paymentAsset/Method Ovo.png'
        ]);

    }
}
