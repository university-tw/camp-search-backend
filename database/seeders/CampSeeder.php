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
            $camp = new Camp();
            $camp->name = $item->name;
            $camp->school = $item->school;
            $camp->department = $item->department;
            $camp->start = $item->start;
            $camp->end = $item->end;
            $camp->apply_end = $item->apply_end;
            $camp->price = $item->price;
            $camp->url = $item->url;

            $camp->approve(User::find(1));

            $camp->save();
        }
    }
}
