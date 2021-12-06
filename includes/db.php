<?php

$mysqli = new mysqli("localhost","root","","wstdb");
if($mysqli->connect_error)
{
    exit('error connecting to database');
}
?>