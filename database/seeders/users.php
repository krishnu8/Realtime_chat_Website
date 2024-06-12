<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i=0;
        while($i<3){
           DB::table('user__data')->insert([
               'Name'=>str::random(10),
               'Email'=>str::random(4).'@gmail.com',
               'Password'=>Hash::make(4),
                'Address'=>str::random(10),
                'Gender'=>'Male',
                'D/O/B'=>'jack',
                'Bio'=>str::random(200),
                'Status'=>'Active'
            ]); 
            $i++; 
        }
    }
}
