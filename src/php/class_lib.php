<?php

class Note
{
    var $title;
    var $content;
    var $date;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->date = date("j, n, Y");
        $this->content = $content;
    }
}

class User
{
    var $id;
    var $imie;
    var $email;
    var $haslo;

    public function __construct($id, $imie, $email, $haslo)
    {
        $this->id = $id;
        $this->imie = $imie;
        $this->email = $email;
        $this->haslo = $haslo;
    }
}
