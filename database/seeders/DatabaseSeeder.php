<?php

namespace Database\Seeders;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::factory()->create(['email' => config('mail.from.address')]);
        /* \App\Models\User::factory(10)->create();
        
        \App\Models\Plan::factory(3)->state(new Sequence(
            ['name' => 'Core'],
            ['name' => 'Premium'],
            ['name' => 'Generation'],
        ))->create();
        \App\Models\Wallet::factory(6)->state(new Sequence(
            ['name'=>'Bitcoin'],
            ['name'=>'Ethereum'],
            ['name'=>'USDT'],
            ['name'=>'Binance'],
            ['name'=>'Solana'],
            ['name'=>'Ripple'],
        ))->create();
         
        */    
        
        \App\Models\Topic::factory(11)->state(new Sequence(
            ['title'=>'Alternative Investments'],
            ['title'=>'Education Planning'],
            ['title'=>'Estate & Wealth Transfer Planning'],
            ['title'=>'Financial Independence'],
            ['title'=>'Healthcare Planning'],
            ['title'=>'Investment Management'],
            ['title'=>'Philanthropy'],
            ['title'=>'Retirement Planning'],
            ['title'=>'Risk Management'],
            ['title'=>'Social Security Planning'],
            ['title'=>'Tax Planning'],
        ))->create();       
    }
}
