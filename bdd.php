<?php 

    function connection() {
        return new PDO('mysql:dbname=artbox;host=localhost', 'root', '');
    }