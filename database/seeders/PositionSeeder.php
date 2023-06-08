<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'name' => 'GK（ゴールキーパー）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'CB（センターバック）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'LB（レフトバック）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'RB（ライトバック）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'CDM（センターディフェンシブミッドフィールダー）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'CM（セントラルミッドフィールダー）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'RM（ライトミッドフィールダー）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'LM（レフトミッドフィールダー）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'RWB（ライトウィングバック）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'LWB（レフトウィングバック）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'RW（ライトウィンガー）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'LW（レフトウィンガー）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'CAM（セントラルアタッキングミッドフィールダー）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'CF（センターフォワード）',
            ],
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'ST（ストライカー）',
            ],
        ]);
    }
}

