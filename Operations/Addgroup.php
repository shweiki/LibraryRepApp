
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
  $sql = "SELECT MAX(id) FROM group_books ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  $new_id = $row['id']+1;
  echo "<option value='$new_id'>
  $name_Group
  </option>
  ";
}
}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}else {
  header('Location: http://'. $_SERVER["SERVER_NAME"].'/LibraryRepApp/Pages/404.html');
}

 ?>
