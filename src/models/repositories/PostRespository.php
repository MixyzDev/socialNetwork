<?php

abstract class PostRepository extends Db
{
    private static function request($request)
    {
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }


    public static function createPost(Post $post){
        self::request("INSERT INTO post(title,content, id_user) VALUES ('" . $post->getTitle() . "' , '" . $post->getContent() . "' , '" . $_SESSION["id"] . "')");
    }

    public static function getPostById($post)
    {
        return self::request("SELECT id FROM user WHERE username='" . $post . "'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getPost()
    {
        return self::request("SELECT * FROM post")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delPost($id) {
        return self::request("DELETE FROM post WHERE id = '" . $id . "'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function modifPost($post){
        return self::request("UPDATE post SET title = '" . $post->getTitle() . "', content = '" . $post->getContent() . "' WHERE id = " . $post->getId() );
    }
}
