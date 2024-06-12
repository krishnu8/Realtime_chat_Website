<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;
use Illuminate\Support\Hash;

class friend extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i=0;
        while($i<3){
           DB::table('friends')->insert([
                'User1'=>rand(),
                'User2'=>rand(),
                'Status'=>'Active'
            ]); 
            $i++; 
        }
    }
}
