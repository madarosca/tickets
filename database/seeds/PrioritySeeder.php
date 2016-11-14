<?php

use Illuminate\Database\Seeder;

class PrioritisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrioritiesTableSeeder::class);

        $High = Priority::create(array(
            'name' => 'High',
            'color' => '#D5000'
        ));

        $Medium = Priority::create(array(
            'name' => 'Medium',
            'color' => '#00ACC1'
        ));

        $Low = Priority::create(array(
            'name' => 'Low',
            'color' => '#727270'
        ));
    }
}
