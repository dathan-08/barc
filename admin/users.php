<?php
// Include your database connection configuration file
require "admin_dash.php";
require 'config.php';

// Define the SQL query to retrieve the data
$query = "SELECT user_id, username, contact_number FROM users";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Check if there are rows in the result set
    if (mysqli_num_rows($result) > 0) {
        // Create an HTML table to display the data
        echo "<table border='1'>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Contact</th>
                </tr>";

        // Fetch and print each row of data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['user_id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['contact_number']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No data found.";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
