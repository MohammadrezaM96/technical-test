<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name' => 'Bitcoin',
                'symbol' => 'btc',
                'fee' => '100',
            ],
            [
                'name' => 'Ethereum',
                'symbol' => 'eth',
                'fee' => '25',
            ],
            [
                'name' => 'Tron',
                'symbol' => 'trx',
                'fee' => '10',
            ],
        ];

        foreach ($datas as $data){
            Currency::create($data);
        }
    }
}
