<?php

namespace Database\Seeders;

use App\Http\Controllers\PacoteController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\PacoteCaracteristicasModel;
use App\Models\PacoteModel;

class PacoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        PacoteModel::create([
            'pacote' => 'Ouro',
            'valor' => '20.00',
            'quantidade' => 4,
            'diasativos' => 8,
        ]);
        

        PacoteModel::create([
            'pacote' => 'Prata',
            'valor' => '16.00',
            'quantidade' => 3,
            'diasativos' => 7,
        ]);
        PacoteModel::create([
            'pacote' => 'Bronze',
            'valor' => '10.00',
            'quantidade' => 1,
            'diasativos' => 5,
        ]);

        PacoteModel::create([
            'pacote' => 'Grátis',
            'valor' => '0.00',
            'quantidade' => 1,
            'diasativos' => 1,
        ]);



        $pacoteA = PacoteModel::where('pacote', 'Ouro')->first();
        $pacoteAId = $pacoteA->id;
        PacoteCaracteristicasModel::create([
            'idpacote' => $pacoteAId,
            'caracteristica' => 'Pacote Ouro',
            'status' => 0,
            // Adicione mais campos conforme necessário
        ]);

        $pacoteA = PacoteModel::where('pacote', 'Prata')->first();
        $pacoteAId = $pacoteA->id;
        PacoteCaracteristicasModel::create([
            'idpacote' => $pacoteAId,
            'caracteristica' => 'Pacote Prata',
            'status' => 0,
            // Adicione mais campos conforme necessário
        ]);

        $pacoteA = PacoteModel::where('pacote', 'Bronze')->first();
        $pacoteAId = $pacoteA->id;
        PacoteCaracteristicasModel::create([
            'idpacote' => $pacoteAId,
            'caracteristica' => 'Pacote Bronze',
            'status' => 0,
            // Adicione mais campos conforme necessário
        ]);

        $pacoteA = PacoteModel::where('pacote', 'Grátis')->first();
        $pacoteAId = $pacoteA->id;
        PacoteCaracteristicasModel::create([
            'idpacote' => $pacoteAId,
            'caracteristica' => 'Pacote Grátis',
            'status' => 0,
            // Adicione mais campos conforme necessário
        ]);



        
    }
}
