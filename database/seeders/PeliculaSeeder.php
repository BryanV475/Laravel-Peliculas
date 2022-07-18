<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use Illuminate\Database\Seeder;
use App\Models\Task;
use database\factories\TaskFactory;

class PeliculaTableSeeder extends Seeder{

  // Run the database seeds.   
  //@return void

  public function run() {
      Pelicula::factory()->times(50)->create();//we will generate 50 records
  }

}