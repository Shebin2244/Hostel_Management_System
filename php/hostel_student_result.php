<?php

// Assuming you have a MySQL database
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert data into the student list table
function insertIntoStudentList($conn, $data)  
{
    // Escape values to prevent SQL injection
foreach ($data as $key => $value) {
    $data[$key] = $conn->real_escape_string($value);
}

// Formulate the SQL query
$sql = "INSERT INTO hostel_student_list (`name`, `gender`, `degree`, `yearOfStudy`, `admissionNo`, `semester`, `branch`, `pAddress`, `gAddress`, `pincode`, `mobile`)
        VALUES ('$data[name]', '$data[gender]', '$data[degree]', '$data[yearOfStudy]', '$data[admissionNo]', '$data[semester]', '$data[branch]', '$data[pAddress]', '$data[gAddress]', '$data[pincode]', '$data[mobile]')";

// Execute the query
$conn->query($sql);

// Check for errors
if ($conn->error) {
    echo "Error: " . $conn->error;
}
}

// Set the maximum limit for student insertion
$maxStudentLimit = 100; // Change this to your desired limit

// Initialize counter variable
$insertedStudentsCount = 0;

// Fetch data from the hostel_student_registration table
$sql = "SELECT * FROM hostel_student_registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['p1'] == 1) {
            // If p1 is 1, store the student details directly into the student list table
            insertIntoStudentList($conn, $row);
            $insertedStudentsCount++;

            // Check if the maximum limit is reached
            if ($insertedStudentsCount >= $maxStudentLimit) {
                break;
            }
        }
    }

    // Move the result pointer back to the beginning of the result set
    $result->data_seek(0);

    while ($row = $result->fetch_assoc()) {
        if ($row['p2'] == 1) {
            // If p2 is 1, store the student details into the student list table
            insertIntoStudentList($conn, $row);
            $insertedStudentsCount++;

            // Check if the maximum limit is reached
            if ($insertedStudentsCount >= $maxStudentLimit) {
                break;
            }
        }
    }

    // Move the result pointer back to the beginning of the result set
    $result->data_seek(0);

    while ($row = $result->fetch_assoc()) {
        if ($row['p1'] != 1 && $row['p2'] != 1) {
            // For other students, check conditions based on year of study and branch
            $yearOfStudy = $row['yearOfStudy'];
            $branch = $row['branch'];
            $randomChance = rand(1, 100); // Generate a random number between 1 and 100

            // Implement the probability conditions
            if ($yearOfStudy == 1 && $randomChance <= 25) {
                insertIntoStudentList($conn, $row);
                $insertedStudentsCount++;

                // Check if the maximum limit is reached
                if ($insertedStudentsCount >= $maxStudentLimit) {
                    break;
                }
            } elseif ($yearOfStudy == 2 && $randomChance <= 15) {
                insertIntoStudentList($conn, $row);
                $insertedStudentsCount++;

                // Check if the maximum limit is reached
                if ($insertedStudentsCount >= $maxStudentLimit) {
                    break;
                }
            } elseif ($yearOfStudy == 3 && $randomChance <= 10) {
                insertIntoStudentList($conn, $row);
                $insertedStudentsCount++;

                // Check if the maximum limit is reached
                if ($insertedStudentsCount >= $maxStudentLimit) {
                    break;
                }
            } elseif ($yearOfStudy == 4 && $randomChance <= 10 && ($branch == 'mca' || $branch == 'mtech')) {
                // Additional conditions for branch 'mca' or 'mtech'
                insertIntoStudentList($conn, $row);
                $insertedStudentsCount++;

                // Check if the maximum limit is reached
                if ($insertedStudentsCount >= $maxStudentLimit) {
                    break;
                }
            }
        }
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();

?>
