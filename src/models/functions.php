<?php 

function connectionDB():PDO 
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
}

function getFriendsList(): array 
{
    $connection = connectionDB();
    $recuperation = $connection->query('SELECT firstname, lastname FROM friend');
    $friends = $recuperation->fetchAll(PDO::FETCH_ASSOC);

    return $friends;
}

function getNewFriend()
{
    $data = array_map('trim', $_POST);
    $data = array_map('htmlentities', $data);

    $connection = connectionDB();
    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname , :lastname)';
    $statement = $connection->prepare($query);
    $statement->bindValue(':firstname', $data['firstname']);
    $statement->bindValue(':lastname', $data['lastname']);
    $statement->execute();
    header('Location:/index.php');
}