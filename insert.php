
<?php


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "variable";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("connection field" . $conn->connect_error);
    }

    $number = $_GET['number'];
    $sql = "INSERT INTO input (input) VALUES ('$number')";



    if ($conn->query($sql) === TRUE) {
        echo "<br>";
    } else {
        echo "an error happened" . $conn->error;
    }

    $sql = "SELECT * FROM input WHERE id=(SELECT MAX(id)FROM input)";


$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "num: "   . $_GET["number"] ;echo " <br>ID : " . $row["ID"];
    }
} else {
    echo "there is no data";
}

    $conn->close();

?>