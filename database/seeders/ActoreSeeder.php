<?php

namespace Database\Seeders;

use App\Models\Actore;
use Illuminate\Database\Seeder;
use App\Models\Task;
use database\factories\TaskFactory;

class ActoreTableSeeder extends Seeder{

  // Run the database seeds.   
  //@return void

  public function run() {
      Actore::factory()->times(50)->create();//we will generate 50 records
  }

}