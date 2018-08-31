
<?php
include "../Operations/connect_libray.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);

$sql = "INSERT INTO group_books (
name, note
)
VALUES (
  '$name_Group',
  '$note_Group'
)";

if ($conn->query($sql) === TRUE) {
    echo "تم اضافة مجموعة مواد جديدة .";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}else {
  header('Location: http://'. $_SERVER["SERVER_NAME"].'/LibraryRepApp/Pages/404.html');
}

 ?>
