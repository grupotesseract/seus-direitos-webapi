<?php

use App\Models\Sindicato;
use App\Repositories\SindicatoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SindicatoRepositoryTest extends TestCase
{
    use MakeSindicatoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SindicatoRepository
     */
    protected $sindicatoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->sindicatoRepo = App::make(SindicatoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSindicato()
    {
        $sindicato = $this->fakeSindicatoData();
        $createdSindicato = $this->sindicatoRepo->create($sindicato);
        $createdSindicato = $createdSindicato->toArray();
        $this->assertArrayHasKey('id', $createdSindicato);
        $this->assertNotNull($createdSindicato['id'], 'Created Sindicato must have id specified');
        $this->assertNotNull(Sindicato::find($createdSindicato['id']), 'Sindicato with given id must be in DB');
        $this->assertModelData($sindicato, $createdSindicato);
    }

    /**
     * @test read
     */
    public function testReadSindicato()
    {
        $sindicato = $this->makeSindicato();
        $dbSindicato = $this->sindicatoRepo->find($sindicato->id);
        $dbSindicato = $dbSindicato->toArray();
        $this->assertModelData($sindicato->toArray(), $dbSindicato);
    }

    /**
     * @test update
     */
    public function testUpdateSindicato()
    {
        $sindicato = $this->makeSindicato();
        $fakeSindicato = $this->fakeSindicatoData();
        $updatedSindicato = $this->sindicatoRepo->update($fakeSindicato, $sindicato->id);
        $this->assertModelData($fakeSindicato, $updatedSindicato->toArray());
        $dbSindicato = $this->sindicatoRepo->find($sindicato->id);
        $this->assertModelData($fakeSindicato, $dbSindicato->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSindicato()
    {
        $sindicato = $this->makeSindicato();
        $resp = $this->sindicatoRepo->delete($sindicato->id);
        $this->assertTrue($resp);
        $this->assertNull(Sindicato::find($sindicato->id), 'Sindicato should not exist in DB');
    }
}
