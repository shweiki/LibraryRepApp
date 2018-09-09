<?php
session_start();
include "../Operations/connect_libray.php";
header('Content-Type: text/plain');
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $time_log = date("Y-m-d h:i:sa");
   $id_user=$_SESSION['user_ID'];

   $invoice_data = utf8_encode($_POST['invoice_data']);
   $invoice_data = json_decode($invoice_data);
   $inventory_data = utf8_encode($_POST['movment_inventory_invoce']);
   $inventory_data = json_decode($inventory_data);


 $sql = "INSERT INTO invoice
 (customer_name, total_items, total_qty, total_ammount, note)
  VALUES (
    '$invoice_data->customer',
    $invoice_data->total_items,
    $invoice_data->total_qty,
    $invoice_data->total_ammount,
    '$invoice_data->note'
  )";
$note ="فاتورة رقم : ".$invoice_data->id;
 if ($conn->query($sql) === TRUE) {
  foreach ($inventory_data as &$value) {

                   $book_id = mysqli_real_escape_string($conn, $value->id);
                   $qty = mysqli_real_escape_string($conn, $value->quantity);
                   $total_qty_we_have =mysqli_real_escape_string($conn, $value->total_qty_we_have);
                   $new_totalqty= $total_qty_we_have- $qty;
                   /// update store
                   $sql = "UPDATE books SET total_qty =$new_totalqty WHERE id = $book_id";
                   if ($conn->query($sql) === TRUE) {
                       echo "Record updated successfully";
                   } else {
                       echo "Error updating record: " . $conn->error;
                   }

                   $sql = "INSERT INTO repository_move(
                     book_id, type_M, qty_move, note, invoice_id, posting_datatime, user_id
                   ) VALUES (
                      $book_id,
                      0,
                      $qty,
                    '$note',
                      $invoice_data->id,
                      '$time_log',
                      $id_user
                    )";

                  if ($conn->query($sql) === TRUE) {
                    echo "في اشي غلط ";
                  }
              }

     echo "تم اضافة مجموعة مواد جديدة .";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }

 $conn->close();

 }else {
   header('Location: http://'. $_SERVER["SERVER_NAME"].'/LibraryRepApp/Pages/404.html');
 }




?>
