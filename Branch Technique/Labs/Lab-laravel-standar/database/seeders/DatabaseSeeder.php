<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table("projects")->insert([
            [
                'nom' => 'Portfolio',
                'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
            ],
            [
                'nom' => 'Arbre des compétences',
                'description' => 'Création d\'une application web pour l\'évaluation des compétences.',
            ],
            [
                'nom' => '  CNMH',
                'description' => 'Création d\'une application web pour laa gestion des patients de centre cnmh.',
            ]
        ]);

    }
}
