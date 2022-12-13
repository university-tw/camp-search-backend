<?php

namespace Database\Seeders;

use App\Models\Camp;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (array_reverse(json_decode(file_get_contents(resource_path('data-1102.json')))) as $item) {
            $sys = User::find(1);

            $camp = $sys->camps()->create([
                'name' => $item->name,
                'school' => $item->school,
                'department' => $item->department,
                'start' => $item->start,
                'end' => $item->end,
                'apply_end' => $item->apply_end,
                'url' => $item->url,
                'status' => 1
            ]);
            $camp->offers()->create([
                'name' => '一般報名',
                'description' => '',
                'price' => $item->price,
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
                'url' => $item->url,
                'recommend' => true,
                'priority' => 101,
                'status' => 0
            ]);
            $camp->offers()->create([
                'name' => '一般報名',
                'description' => '',
                'price' => $item->price,
            ]);
        }

        foreach (['data-1120.json',
                     'data-university.tw-1213.json'] as $path) {
            foreach (array_reverse(json_decode(file_get_contents(resource_path($path)))) as $item) {
                $sys = User::find(1);

                $camp = $sys->camps()->create([
                    'name' => $item->name,
                    'school' => $item->school,
                    'department' => $item->department,
                    'start' => $item->start,
                    'end' => $item->end ?? $item->start,
                    'apply_end' => $item->apply_end ?? Carbon::now()->addYear(),
                    'url' => $item->url,
                    'status' => 1,
                    'recommend' => $item->recommend ?? false,
                    'priority' => $item->priority ?? 100,
                ]);
                foreach ($item->offers as $offer) {
                    $camp->offers()->create([
                        'name' => $offer->name,
                        'description' => $offer->name,
                        'price' => $offer->price,
                    ]);
                }
                foreach ($item->tags as $tag) {
                    $camp->tags = [
                        ...($camp->tags ?? []),
                        $tag
                    ];
                }
                $camp->save();
            }
        }
    }
}
