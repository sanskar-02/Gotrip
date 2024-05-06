<?php
session_start();
include("./admin/includes/config.php");

if(isset($_POST['amt'])) {
    $amount = $_POST['amt'];
    $payment_status = "pending";
    
    // Insert payment details into the database
    $sql = "INSERT INTO payment (amount, payment_status) VALUES (:amount, :payment_status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':amount', $amount, PDO::PARAM_STR);
    $query->bindParam(':payment_status', $payment_status, PDO::PARAM_STR);
    $query->execute();
    $payment_id = $dbh->lastInsertId();

    if($payment_id) {
        echo json_encode(array("payment_id" => $payment_id));
    } else {
        echo json_encode(array("error" => "Payment processing failed"));
    }
}

if(isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    $order_id = $_SESSION['OID'];
    
    // Update payment status in the database
    $sql = "UPDATE payment SET payment_status = 'complete', payment_id = :payment_id WHERE id = :order_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':payment_id', $payment_id, PDO::PARAM_STR);
    $query->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $query->execute();

    // Redirect or perform any other actions after successful payment
    echo json_encode(array("success" => "Payment processed successfully"));
}
?>
