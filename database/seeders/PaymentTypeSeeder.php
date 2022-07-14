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
            'payment_type_logo' => '/paymentAsset/Method BCA.png',
            'virtual_account' => '123432123'
        ]);

        PaymentType::create([
            'payment_type_name' => 'BNI',
            'payment_type_logo' => '/paymentAsset/Method BNI.png',
            'virtual_account' => '456765456'
        ]);

        PaymentType::create([
            'payment_type_name' => 'BRI',
            'payment_type_logo' => '/paymentAsset/Method BRI.jpg',
            'virtual_account' => '789098789'
        ]);

        PaymentType::create([
            'payment_type_name' => 'Dana',
            'payment_type_logo' => '/paymentAsset/Method Dana.png',
            'virtual_account' => '012321012'
        ]);

        PaymentType::create([
            'payment_type_name' => 'Gopay',
            'payment_type_logo' => '/paymentAsset/Method Gopay.png',
            'virtual_account' => '345654345'
        ]);

        PaymentType::create([
            'payment_type_name' => 'Ovo',
            'payment_type_logo' => '/paymentAsset/Method Ovo.png',
            'virtual_account' => '678987678'
        ]);

    }
}
