<?php

namespace classes;

class User
{

    private $user;
    private $con;
``
    public function __construct($user, $con)
    {
        $this->con = $con;
        $userDetailQuery = mysqli_query($con, "SELECT * FROM users WHERE username = '$user'");
        $this->user = mysqli_fetch_array($userDetailQuery);
    }

    function getFirstAndLastName()
    {
        $username = $this->user['username'];
        $query = mysqli_query(this->$con, "SELECT firstname, lastname FROM users WHERE username = '$username'");
        $row = mysqli_fetch_array($query);
        return $this->user["firstName"] . " " . $this->user["lastName"];
    }

}