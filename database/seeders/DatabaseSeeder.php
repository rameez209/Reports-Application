<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(class:AdminUserSeeder::class);
        
        $user = User::factory()->create([
                'name' => 'Admin',
                'jobtitle' => 'Application Developer',
                'role' => '2',
                'email' => 'rmuhammad@sjgh.org',
                'password' => bcrypt('R@meez92')
            ]);
    
            // Report::factory(6)->create([
            //     'user_id' => $user->id
            // ]);

        // Report::create([
        //         'report_name' => 'zzCPM- Active Encounters With Cancelled Appointments', 
        //         'department' => 'laravel, javascript',
        //         'requested_by' => 'Admissions',
        //         'validated_by' => 'Adele Campos',
        //         'frequency' => 'N/A',
        //         'updated_by' => 'Shakir Khan',
        //         'description' => 'This report was designed to act like the Past Due Arrivals worklist that is in Access Management. The idea being that any encounters that are not automatically cancelled when the appointment is cancelled need to be reviewed because of clinical documentation being placed on the encounter (charges, orders, and clinical events). This report should be reviewed every day for appointments that were scheduled to begin the previous day. The report will return appointments that are in a cancelled, no show, or rescheduled state.'
        // ]);
        // Report::create([
        //         'report_name' => 'Active Encounters', 
        //         'department' => 'laravel, javascript',
        //         'requested_by' => 'Admissions',
        //         'validated_by' => 'Adele Campos',
        //         'frequency' => 'N/A',
        //         'updated_by' => 'Danial Khan',
        //         'description' => 'This report was designed to act like the Past Due Arrivals worklist that is in Access Management. The idea being that any encounters that are not automatically cancelled when the appointment is cancelled need to be reviewed because of clinical documentation being placed on the encounter (charges, orders, and clinical events). This report should be reviewed every day for appointments that were scheduled to begin the previous day. The report will return appointments that are in a cancelled, no show, or rescheduled state.'
        // ]);
        // Report::create([
        //         'report_name' => 'Encounters With Cancelled Appointments', 
        //         'department' => 'laravel, javascript',
        //         'requested_by' => 'Admissions',
        //         'validated_by' => 'Adele Campos',
        //         'frequency' => 'N/A',
        //         'updated_by' => 'Rameez Khan',
        //         'description' => 'This report was designed to act like the Past Due Arrivals worklist that is in Access Management. The idea being that any encounters that are not automatically cancelled when the appointment is cancelled need to be reviewed because of clinical documentation being placed on the encounter (charges, orders, and clinical events). This report should be reviewed every day for appointments that were scheduled to begin the previous day. The report will return appointments that are in a cancelled, no show, or rescheduled state.'
        // ]);
        // Report::create([
        //         'report_name' => 'Cancelled Appointment', 
        //         'department' => 'laravel, javascript',
        //         'requested_by' => 'Admissions',
        //         'validated_by' => 'Adele Campos',
        //         'frequency' => 'N/A',
        //         'updated_by' => 'Fasil Khan',
        //         'description' => 'This report was designed to act like the Past Due Arrivals worklist that is in Access Management. The idea being that any encounters that are not automatically cancelled when the appointment is cancelled need to be reviewed because of clinical documentation being placed on the encounter (charges, orders, and clinical events). This report should be reviewed every day for appointments that were scheduled to begin the previous day. The report will return appointments that are in a cancelled, no show, or rescheduled state.'
        // ]);
    }
}
