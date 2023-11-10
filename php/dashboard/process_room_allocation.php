<?php
// Connect to the MySQL database
include '../../connection/connection.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the number of rooms for each program
    $btech_rooms = $_POST['btech_rooms'];
    $mtech_rooms = $_POST['mtech_rooms'];
    $mca_rooms = $_POST['mca_rooms'];

    // Allocate rooms for B.Tech students
    allocateRooms("B.Tech", $btech_rooms);

    // Allocate rooms for M.Tech students
    allocateRooms("M.Tech", $mtech_rooms);

    // Allocate rooms for MCA students
    allocateRooms("MCA", $mca_rooms);

    // Display a success message and redirect to another page
    echo '<script>';
    echo 'alert("Allocation Completed!");';
    echo 'window.location.href = "matron_dashboard.php";'; // Replace with the URL you want to redirect to
    echo '</script>';
}

// Function to allocate rooms for a specific program
function allocateRooms($degree, $numRooms) {
    global $conn;

    $query = "SELECT admissionNo FROM hostel_student_list WHERE degree = '$degree'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $students = $result->fetch_all(MYSQLI_ASSOC);
        $roomIds = getAvailableRooms($numRooms);

        // Get the existing allocations for the selected degree
        $existingAllocations = getExistingAllocations($degree);

        foreach ($students as $student) {
            if (empty($roomIds)) {
                echo "Not enough rooms for $degree students.";
                break;
            }

            $admission_no = $student['admissionNo'];

            // Check if the student is already allocated a room
            $isAllocated = in_array($admission_no, array_column($existingAllocations, 'admission_no'));

            // If the student is not already allocated, allocate a room
            if (!$isAllocated) {
                $roomId = array_shift($roomIds);

                $insertQuery = "INSERT INTO allocations (room_id, admission_no) VALUES ($roomId, $admission_no)";
                $conn->query($insertQuery);
            }
        }
    }
}
// Function to get available rooms
function getAvailableRooms($numRooms) {
    global $conn;

    $query = "SELECT room_id FROM rooms WHERE capacity > 0";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $roomIds = $result->fetch_all(MYSQLI_ASSOC);
        $roomIds = array_column($roomIds, 'room_id');
        return array_slice($roomIds, 0, $numRooms);
    }

    return [];
}

// Function to get existing allocations for a specific degree
function getExistingAllocations($degree) {
    global $conn;

    $query = "SELECT admission_no FROM allocations
              INNER JOIN hostel_student_list ON allocations.admission_no = hostel_student_list.admissionNo
              WHERE hostel_student_list.degree = '$degree'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    return [];
}

?>
