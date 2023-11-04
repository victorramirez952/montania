<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch the user by id
        $user = User::find(15); // Assuming the user with ID 15 exists

        // Check if the user exists
        if ($user) {
            // Assign the role 'Admin' to the user
            $user->assignRole('Admin');
        } else {
            // User with ID 15 not found
            echo "User with ID 15 not found.";
        }
    }
}
