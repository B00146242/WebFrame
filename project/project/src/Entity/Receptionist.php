<?php

namespace App\Entity;

class Receptionist
{
    function viewOrder($orderID)
    {
        $sql = "SELECT * FROM order WHERE order_id = ?";
        $stmt = $this->database->prepare($sql);
        $stmt = $this->execute([$orderID]); 
        return $stmt->fetchAll();
    }
    
    function createRentalOrder($clientid, $itemid, $startDate, $endDate)
    {
        $sql = "INSERT INTO orders(client_id, item_id, start_Date, end_Date, status)VALUES(?,?,?,?, 'rented')";
        $stmt = $this->database->prepare($sql);
        $stmt->execute([$clientid, $itemid, $startDate, $endDate]);
        return $this->database->lastInsertId();
    }

    function AvailableClothes()
    {
        $sql = "SELECT * FROM items WHERE status = 'available'";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function Rental($orderID, $condition)
    {
        $updateSql = "UPDATE order SET status = 'return' WHERE order_id = ?";
        $stmt = $this->database->prepare($updateSql);
        $stmt = $this->execute([$orderID]);

        if($condition == 'repair needed' || $condition == 'cleaning needed'){
            $itemUpdateSql = "UPDATE items SET status = ? WHERE items_id = (SELECT itme_id FROM orders WHERE order_id = ?)";
            $stmt = $this->database->prepare($itemUpdateSql);
            $stmt->execute([$condition, $orderID]);
        }
    }

    function damagedClothes($itemId, $newStatus)
    {
        $sql = "UPDATE items SET status = ? WHERE items_id= ?";
        $stmt = $this->database->prepare($sql);
        $stmt = $this->execute([$itemId, $newStatus]);
    }
    
}