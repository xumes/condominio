<?php namespace Aula\Classes;

class ConnectionDB
{
    private $DSN;
    private $user;
    private $pwd;

    public function __construct($DSN, $user, $pwd)
    {
        $this->DSN = $DSN;
        $this->user = $user;
        $this->pwd = $pwd;
    }

    public function connect()
    {
        try {
            return new \PDO($this->DSN, $this->user, $this->pwd);
        } catch (\PDOException $err) {
            die('Erro: '.$err->getCode().' Descrição: '.$err->getMessage());
        }
    }
}
