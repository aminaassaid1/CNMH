<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tasks")->insert([
            [
                'nom' => 'creation base donner',
                'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
                'projetId'=> '1',
            ],
            [
                'nom' => 'Create a system for managing and booking event venues',
                'description' => 'Création d\'une application web pour l\'évaluation des compétences.',
                'projetId'=> '2',
            ],
            [
                'nom' => '  Implement a ticketing system for selling event tickets online',
                'description' => 'Création d\'une application web pour laa gestion des patients de centre cnmh.',
                'projetId'=> '3',
            ]
        ]);
    }
}
