

<?php

$id = "id";
$name = "name";


// Create connection
$conn = new mysqli($id, $name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO 16template_user (id, name)
VALUES ('suckmy', 'ass')";

echo($sql);

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>


