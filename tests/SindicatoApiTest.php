<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SindicatoApiTest extends TestCase
{
    use MakeSindicatoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSindicato()
    {
        $sindicato = $this->fakeSindicatoData();
        $this->json('POST', '/api/v1/sindicatos', $sindicato);

        $this->assertApiResponse($sindicato);
    }

    /**
     * @test
     */
    public function testReadSindicato()
    {
        $sindicato = $this->makeSindicato();
        $this->json('GET', '/api/v1/sindicatos/'.$sindicato->id);

        $this->assertApiResponse($sindicato->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSindicato()
    {
        $sindicato = $this->makeSindicato();
        $editedSindicato = $this->fakeSindicatoData();

        $this->json('PUT', '/api/v1/sindicatos/'.$sindicato->id, $editedSindicato);

        $this->assertApiResponse($editedSindicato);
    }

    /**
     * @test
     */
    public function testDeleteSindicato()
    {
        $sindicato = $this->makeSindicato();
        $this->json('DELETE', '/api/v1/sindicatos/'.$sindicato->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/sindicatos/'.$sindicato->id);

        $this->assertResponseStatus(404);
    }
}
