<?php

namespace Database\Seeders;

use App\Models\Camp;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach (array_reverse(json_decode(file_get_contents(resource_path('data-1102.json')))) as $item) {
            $sys = User::find(1);

            $camp = $sys->camps()->create([
                'name' => $item->name,
                'school' => $item->school,
                'department' => $item->department,
                'start' => $item->start,
                'end' => $item->end,
                'apply_end' => $item->apply_end,
                'price' => $item->price,
                'url' => $item->url,
                'status' => 1
            ]);
        }
        foreach (array_reverse(json_decode(file_get_contents(resource_path('data-university.tw.json')))) as $item) {
            $sys = User::find(1);

            $camp = $sys->camps()->create([
                'name' => $item->name,
                'school' => $item->school,
                'department' => $item->department,
                'start' => $item->start,
                'end' => $item->end,
                'apply_end' => $item->apply_end,
                'price' => $item->price,
                'url' => $item->url,
                'recommend' => true,
                'priority' => 101,
                'status' => 1
            ]);
        }
    }
}
