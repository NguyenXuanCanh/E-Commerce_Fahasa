<?php
class Publisher
{
    function getAll()
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM publisher");
    }
    function add($PublisherName)
    {
        require('../connection.php');
        return $conn->query("INSERT INTO publisher (`PublisherName`,`Status`) VALUE ('$PublisherName',1)");
    }
    function update($PublisherID, $PublisherName)
    {
        require('../connection.php');
        return $conn->query("UPDATE publisher SET PublisherName='$PublisherName' WHERE PublisherID='$PublisherID'");
    }
    function delete($PublisherID)
    {
        require('../connection.php');
        return $conn->query("DELETE FROM publisher WHERE PublisherID='$PublisherID'");
    }
    function getPublisherByID($publisherID)
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM publisher WHERE PublisherID=$publisherID");
    }
}
