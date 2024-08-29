<?php

class AuthModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('pegawai');
        $this->setColumn([
            'id',
            'nama',
            'no_hp',
            'email',
            'username',
            'password',
            'role'
        ]);
    }

    public function findByIdentifier($identifier)
    {
        $params = [
            'username' => $identifier,
            'email' => $identifier,
            'no_hp' => $identifier
        ];
        return $this->get($params, 'OR')->fetch(PDO::FETCH_ASSOC);
    }


    public function createUser($data)
    {
        if (!isset($data['username'], $data['password'], $data['email'], $data['no_hp'], $data['nama'])) {
            throw new InvalidArgumentException('Missing required user data');
        }

        return $this->insertData([
            'nama' => $data['nama'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $data['password']
        ]);
    }
}
