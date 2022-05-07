<?php
class Book
{
    function getAll()
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM book");
    }
    function getListByCateID($cateid)
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM book WHERE CategoryID = '$cateid'");
    }
    function getListByCateIDs($cateids)
    {
        require('./connection.php');
        $query = "SELECT * FROM book WHERE ";
        $loop = false;
        foreach ($cateids as $id) {
            if (!$loop) {
                $query .= "CategoryID='$id'";
                $loop = true;
            } else {
                $query .= " OR CategoryID='$id'";
            }
        }
        return $conn->query($query);
    }
    function getByID($vegetableID)
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM book WHERE BookID = '$vegetableID'");
    }
    function getByName($bookName)
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM book WHERE BookName LIKE '%$bookName%'");
    }
    function getByAttribute($attribute, $value)
    {
        require('./connection.php');
        if ($attribute == 'discount')
            return $conn->query("SELECT * FROM book WHERE $attribute >= '$value'");
        return $conn->query("SELECT * FROM book WHERE $attribute = '$value'");
    }
}
