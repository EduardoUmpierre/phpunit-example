<?php

use PHPUnit\Framework\TestCase;

require_once './src/Api.php';

class ApiTest extends TestCase
{
    private $api;

    /**
     * @before
     */
    public function setUpApi()
    {
        $this->api = new src\Api();
    }

    /**
     * @test
     * @testdox Testa a listagem dos usuários
     */
    public function get()
    {
        $this->assertCount(3, json_decode($this->api->get()));
    }

    /**
     * @test
     * @testdox Testa a obtenção dos dados de um usuário
     */
    public function getOne()
    {
        $this->assertArrayHasKey('name', (array)json_decode($this->api->getOne(2)));
        $this->assertArrayHasKey('name', (array)json_decode($this->api->getOne(3)));
    }

    /**
     * @test
     * @testdox Testa a inserção de um usuário
     */
    public function post()
    {
        $params = ['name' => 'Gilberto'];

        $this->assertCount(3, json_decode($this->api->get()));

        $this->assertJsonStringEqualsJsonString(json_encode($params), $this->api->post($params));

        $this->assertCount(5, json_decode($this->api->get()));
    }

    /**
     * @test
     * @testdox Testa um post inválido
     * @expectedException Exception
     * @expectedExceptionCode 1
     * @expectedExceptionMessage O campo nome deve ser preenchido
     */
    public function invalidPost()
    {
        $this->api->post([]);
    }
}
