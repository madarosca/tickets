<?php

use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusesTableSeeder::class);

        $New = Status::create(array(
            'name' => 'New',
            'closes' => 'N'
        ));

        $Open = Status::create(array(
            'name' => 'Open',
            'closes' => 'N'
        ));

        $InProgress = Status::create(array(
            'name' => 'In Progress',
            'closes' => 'N'
        ));

        $Closed = Status::create(array(
            'name' => 'Closed',
            'closes' => 'D'
        ));
    }
}