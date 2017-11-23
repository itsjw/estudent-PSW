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
    var $username;
    var $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}
