<?php

// Assuming you have a database connection
$mysqli = new mysqli("localhost", "root", "", "db_kampus");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch data from the database
$result = $mysqli->query("SELECT * FROM biodata");

// Check if there are results
if ($result->num_rows > 0) {
    $biodata = array();

    // Fetch each row and add it to the array
    while ($row = $result->fetch_assoc()) {
        $biodata[] = $row;
    }

    // Convert the array to JSON
    $json_data = json_encode($biodata, JSON_PRETTY_PRINT);

    // Save the JSON data to a file
    $file_path = 'biodata.json';

    if (file_put_contents($file_path, $json_data)) {
        echo "JSON data has been successfully saved to $file_path";
    } else {
        echo "Error saving JSON data to $file_path";
    }
} else {
    echo "No data found";
}

// Close the database connection
$mysqli->close();

?>
