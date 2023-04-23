<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'id'         => 1,
            'name'       => 'Teacher',
            'email'      => 'teacher@example.com',
            'password'   => bcrypt('teacher123'),
            'course_id'     => '1',
            'phone'      => '0768815289',
            'remember_token'  => Str::random(80),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
