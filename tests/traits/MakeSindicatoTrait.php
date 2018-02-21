<?php

use App\Models\Sindicato;
use Faker\Factory as Faker;
use App\Repositories\SindicatoRepository;

trait MakeSindicatoTrait
{
    /**
     * Create fake instance of Sindicato and save it in database.
     *
     * @param array $sindicatoFields
     * @return Sindicato
     */
    public function makeSindicato($sindicatoFields = [])
    {
        /** @var SindicatoRepository $sindicatoRepo */
        $sindicatoRepo = App::make(SindicatoRepository::class);
        $theme = $this->fakeSindicatoData($sindicatoFields);

        return $sindicatoRepo->create($theme);
    }

    /**
     * Get fake instance of Sindicato.
     *
     * @param array $sindicatoFields
     * @return Sindicato
     */
    public function fakeSindicato($sindicatoFields = [])
    {
        return new Sindicato($this->fakeSindicatoData($sindicatoFields));
    }

    /**
     * Get fake data of Sindicato.
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSindicatoData($sindicatoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'sigla' => $fake->word,
            'nome_responsavel' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
        ], $sindicatoFields);
    }
}
