<?php
class Post extends PostRepository
{
    private $id;
    private $title;
    private $content;
    private $id_user;

    public function __construct($title, $content, $id_user, $id = 0)
    {
        $this->id = htmlspecialchars($id);
        $this->setTitle($title);
        $this->setContent($content);
        $this->setIdUser($id_user);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setIdUser($id_user)
    {
        $this->id_user = htmlspecialchars($id_user);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getTitledecrypt()
    {
        return html_entity_decode($this->title);
    }

    public function setTitle($title)
    {
        $this->title = htmlspecialchars($title);
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getContentdecrypt()
    {
        return html_entity_decode($this->content);
    }

    public function setContent($content)
    {
        $this->content = htmlspecialchars($content);
    }
}
// representation sous forme de classe des tables de la base de données