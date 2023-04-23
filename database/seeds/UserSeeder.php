<?php

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
        DB::table('users')->insert([
            'id'         => 1,
            'name'       => 'Student',
            'email'      => 'student@example.com',
            'password'   => bcrypt('student123'),
            'phone'      => '0768785289',
            'nic'        => '778889874V',
            'bday'       => '1999-10-12',
            'teacher_id'    =>'1',
            'remember_token'  => Str::random(80),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
