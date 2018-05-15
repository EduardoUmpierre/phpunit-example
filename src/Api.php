<?php

namespace src;

class Api
{
    private $users = [
        ['name' => 'César'],
        ['name' => 'Danilo'],
        ['name' => 'José']
    ];

    /**
     * @return string
     */
    public function get()
    {
        return json_encode($this->users);
    }

    /**
     * @param int $key
     * @return string
     */
    public function getOne(int $key)
    {
        return json_encode($this->users[$key]);
    }

    /**
     * @param array $params
     * @return string
     * @throws \Exception
     */
    public function post(array $params)
    {
        if (!isset($params['name'])) {
            throw new \Exception('O campo nome deve ser preenchido', 1);
        }

        $this->users[] = $params['name'];

        return json_encode(['name' => $params['name']]);
    }
}

