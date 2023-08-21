<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\ReligionSeeder;
use Database\Seeders\BloodTableSeeder;
use Database\Seeders\NationalitySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            
        $this->call([BloodTableSeeder::class,
        NationalitySeeder::class,  
        ReligionSeeder::class,
        GenderTableSeeder::class,
        SpecializationsTableSeeder::class,
    
    
    
    
    ]);  



    }
}
