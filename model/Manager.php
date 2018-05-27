<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    // Connexion à la base de donnée
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'dbuser', '');
        return $db;
    }
}
