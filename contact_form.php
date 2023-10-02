<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contact_form";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["firstName"];
        $last_name = $_POST["lastName"];
        $email = $_POST["email"];
        $contact_number = $_POST["contactNumber"];
        $message = $_POST["message"];

        $sql = "INSERT INTO contact_messages (first_name, last_name, email, contact_number, message)
                VALUES ('$first_name', '$last_name', '$email', '$contact_number', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    $conn->close();
    ?>

</body>
</html>