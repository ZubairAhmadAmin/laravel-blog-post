<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['logo'=>'SiteLogo.png', 'facebook'=>'http://www.facebook.com', 'twitter'=>'http://www.twitter.com', 'email'=>'weblog@gmail.com', 'phone'=>'0743284709', 'address'=>'kabul']);
    }
}
