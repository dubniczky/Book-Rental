<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Create demo librarian
        User::factory()->count(1)->create([
            'is_librarian' => true,
            'name' => 'Demo Librarian',
            'email' => 'librarian@brs.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        # Create demo reader
        User::factory()->count(1)->create([
            'is_librarian' => false,
            'name' => 'Demo Reader',
            'email' => 'reader@brs.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        # Create random users
        User::factory()->count(30)->create();
    }
}
