<?php

abstract class UserRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getLog($username, $password){
        return self::request("SELECT id FROM user WHERE username='" . $username . "' AND Password='" . $password . "'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUserById($id){
        return self::request("SELECT username FROM user WHERE id='" . $id . "'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUserByUsername($username){
        return self::request("SELECT username FROM user WHERE username='" . $username . "'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertNewUser($newusername, $newpassword)
    {
        return self::request("INSERT INTO user(username, password) VALUES ('" . $newusername . "' , '" . $newpassword . "')");
    }

    // public static function getPokemons(){
    //     return self::request("SELECT * FROM pokemon")->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public static function getCapturedPokemons(){
    //     return self::request("SELECT * FROM pokemon WHERE captured = 1")->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public static function getPokemonById($id){
    //     return self::request("SELECT * FROM pokemon WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    // }

    // public static function getPokemonByName($name){
    //     return self::request("SELECT * FROM pokemon WHERE name=$name")->fetch(PDO::FETCH_ASSOC);
    // }

    // public static function insertIntoDb(Pokemon $pokemon){
    //     return self::request("INSERT INTO pokemon(name) VALUES('". $pokemon->getName() ."')");
    // }

    // public static function updateDb(Pokemon $pokemon){
    //     return self::request("UPDATE pokemon SET name='". $pokemon->getName() . "', captured = " . $pokemon->getCaptured() . " WHERE id=" . $pokemon->getId());
    // }

    // public static function removeFromDb(Pokemon $pokemon){
    //     return self::request("DELETE FROM pokemon WHERE id=" . $pokemon->getId());
    // }
}