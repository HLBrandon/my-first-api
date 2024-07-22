<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Career::create([
            "career_name" => "Ingenieria en Sistemas Computacionales",
            "acronym" => "ISC"
        ]);

        Career::create([
            "career_name" => "Ingenieria en Mecatrónica",
            "acronym" => "IMT"
        ]);

        Career::create([
            "career_name" => "Ingenieria en Gestión Empresarial",
            "acronym" => "IGE"
        ]);
    }
}
