<?php

use Illuminate\Database\Seeder;
use App\Models\EventCategory as Category;

class EventCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = new Category;
        $c2 = new Category;

        $c1->name = 'Athlete vs Athlete';
        $c2->name = 'Team vs Team';

        $c1->save();
        $c2->save();
    }
}
