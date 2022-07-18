<?php

namespace Database\Seeders;

use App\Models\Socio;
use Illuminate\Database\Seeder;
use App\Models\Task;
use database\factories\TaskFactory;

class SocioTableSeeder extends Seeder{

  // Run the database seeds.   
  //@return void

  public function run() {
      Socio::factory()->times(50)->create();//we will generate 50 records
  }

}