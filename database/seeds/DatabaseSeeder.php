<?php

use Illuminate\Database\Seeder;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User',20)->create();
        factory('App\Company',20)->create();
        factory('App\Job',20)->create();

        $categories=[
            'Government','Software','Medical','BITM','Basis','Sports','NGO','Education'
        ];
        foreach ($categories as $category){
            Category::create(['name'=>$category]);
        }
    }
}
