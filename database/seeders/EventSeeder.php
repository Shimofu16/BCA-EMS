<?php

namespace Database\Seeders;

use App\Models\Admin\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =        [
            ['title' => 'Demo Event-1','color'=>'#b3bbf4', 'start' => '2022-04-11', 'end' => '2022-04-12','time'=>'02:30:00' ,'created_at'=>now()],
            ['title' => 'Demo Event-2', 'start' => '2022-04-11', 'end' => '2022-04-13','time'=>'03:30:00','created_at'=>now()],
            ['title' => 'Demo Event-3', 'start' => '2022-04-14', 'end' => '2022-04-14','time'=>'04:30:00','created_at'=>now()],
            ['title' => 'Demo Event-3', 'start' => '2022-04-17', 'end' => '2022-04-17','time'=>'05:30:00','created_at'=>now()],
        ];
        foreach ($data as $item) {
            Event::create($item);
        }
    }
}
