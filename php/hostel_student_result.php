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
$sql = "INSERT IGNORE INTO hostel_student_list (`name`, `gender`, `degree`, `yearOfStudy`, `admissionNo`, `semester`, `branch`, `pAddress`, `gAddress`, `pincode`, `mobile`, `distance_metric`, `income_metric`)
        VALUES ('$data[name]', '$data[gender]', '$data[degree]', '$data[yearOfStudy]', '$data[admissionNo]', '$data[semester]', '$data[branch]', '$data[pAddress]', '$data[gAddress]', '$data[pincode]', '$data[mobile]', '$data[distance]', '$data[aIncome]')";

$sql1= "INSERT IGNORE INTO login (`username`,`password`,`user_type`) VALUES ('$data[admissionNo]','$data[admissionNo]','student')";

// Execute the query
$conn->query($sql);
$conn->query($sql1);
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
            } elseif (($yearOfStudy == 4 && $randomChance <= 10) || // For year 4
            (($branch == 'MCA' || $branch == 'M.Tech') && $randomChance <= 10)) { // For 'mca' or 'mtech'
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

// JavaScript code to display an alert and redirect
echo '<script type="text/javascript">';
echo 'alert("List Generated Successfully.");';
echo 'window.location = "dashboard/wardenDashboard/finalized_students.php";'; // Replace "another_page.php" with the URL of the page you want to redirect to.
echo '</script>';
?>
