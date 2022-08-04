<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [];
    for ($i = 0; $i < 20; $i++) {
        array_push($dataArray, [
            'name' => Str::random(10),
            'content' => Str::random(10),
            'image' => 'https://haycafe.vn/anh-gai-xinh-viet-nam/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
    DB::table('_tasks')->insert($dataArray);
    }
}
