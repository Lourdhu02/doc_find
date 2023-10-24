<?php
include('hospitals.html');
$host = "sql301.infinityfree.com";
$username = "if0_35267460";
$password = "bvBPyLMKVD";
$database = "if0_35267460_findDoctors";


$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $specialization = $_POST["specialization"];
    $area = $_POST["area"];

    $query = "SELECT * FROM doctors WHERE specialization = '$specialization' AND area = '$area'";
    $result = mysqli_query($connection, $query);


    if ($result) {
        echo "<table>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class=doc_row>";
            echo "<td >" . $row["specialization"] . "</td>";
            echo "<td>" . $row["name"] . "</td>"; // Replace with your actual column names
            echo "<td>" . $row["contact"] . "</td>";
            echo "<td>" . $row["mail"] . "</td>";
            echo "<td>" . "<button class='fn' onclick='confirmAppointment(\"{$row["name"]}\")'>" . "Shedule an Appointment" . "</button>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
