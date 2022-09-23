<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rameez',
            'jobtitle' => 'Software Develoer',
            'role' => '2',
            'email' => 'rmuhammad@enginedome.com',
            'password' => bcrypt('R@meez92')
        ]);
    }
}
