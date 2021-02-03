<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->seedUsers();
		$this->command->info('Tabla users inicializada con datos!');
    }
    private function seedUsers()
	{
		DB::table('users')->delete();
		
		// user # 1
		$user = new User;
		$user->name = "User1";
		$user->email = "example@mail.com";
		$user->password = bcrypt("example123");
		$user->save();
			
		// user # 2
		$user = new User;
		$user->name = "User2";
		$user->email = "example2@mail.com";
		$user->password = bcrypt("example1234");
		$user->save();

		// user # 3
		$user = new User;
		$user->name = "User3";
		$user->email = "example3@mail.com";
		$user->password = bcrypt("example12345");
		$user->save();

	}
}
