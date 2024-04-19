<?php 
require_once('DBconnect.php');
if (isset($_POST['productname']) && isset($_POST['productprice']) && isset($_POST['customeremail']) && isset($_POST['productid']) && isset($_POST['productamount'])){
    $customeremail = $_POST['customeremail'];
    $productid = $_POST['productid'];
    $productName = $_POST['productname'];
    $productPrice = $_POST['productprice'];
    $productamount = $_POST['productamount'];
    $sql = "SELECT COUNT(*) AS count FROM carts WHERE customeremail = '$customeremail' AND productid = '$productid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];
        // we check if product already exist or not so that we can update quantity
        
        $sql = "INSERT INTO carts (customeremail, productid, productname, price, productamount) VALUES ('$customeremail', '$productid', '$productName', '$productPrice', '$productamount')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: allItems.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>