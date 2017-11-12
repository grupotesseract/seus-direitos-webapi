<?php

use App\Models\Estado;
use Illuminate\Database\Seeder;

class FakeSindicatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pegando 3 cidades para associar a um sindicado
        $cidadesSP = Estado::where('sigla', 'ilike', "%SP%")->first()
            ->cidades()->orderByRaw('RANDOM()')->get()->take(3);

        factory(App\Models\Sindicato::class)->create()->cidades()
            ->sync( $cidadesSP->pluck('id') );

        // Pegando 2 cidades para associar a um sindicado
        $cidadesSP = Estado::where('sigla', 'ilike', "%SP%")->first()
            ->cidades()->orderByRaw('RANDOM()')->get()->take(1);

        factory(App\Models\Sindicato::class)->create()->cidades()
            ->sync( $cidadesSP->pluck('id') );
        
        // Pegando 2 cidades para associar a um sindicado
        $cidadesSP = Estado::where('sigla', 'ilike', "%AM%")->first()
            ->cidades()->orderByRaw('RANDOM()')->get()->take(5);

        factory(App\Models\Sindicato::class)->create()->cidades()
            ->sync( $cidadesSP->pluck('id') );
        

    }
}
