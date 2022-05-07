<?php
class category
{
    function getAll()
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM category");
    }
    function add($PublisherName)
    {
        require('../connection.php');
        return $conn->query("INSERT INTO category (`Name`,`Status`) VALUE ('$PublisherName',1)");
    }
    function update($PublisherID, $PublisherName)
    {
        require('../connection.php');
        return $conn->query("UPDATE category SET Name='$PublisherName' WHERE CategoryID='$PublisherID'");
    }
    function delete($PublisherID)
    {
        require('../connection.php');
        return $conn->query("DELETE FROM category WHERE CategoryID='$PublisherID'");
    }
    function getCateByID($cateID)
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM category WHERE CategoryID=$cateID");
    }
}
