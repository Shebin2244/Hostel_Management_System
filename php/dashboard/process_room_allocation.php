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

    echo "Room allocation completed.";
}

// Function to allocate rooms for a specific program
function allocateRooms($branch, $numRooms) {
    global $conn;

    $query = "SELECT admissionNo FROM hostel_student_list WHERE branch = '$branch'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $students = $result->fetch_all(MYSQLI_ASSOC);
        $roomIds = getAvailableRooms($numRooms);

        foreach ($students as $student) {
            if (empty($roomIds)) {
                echo "Not enough rooms for $branch students.";
                break;
            }

            $roomId = array_shift($roomIds);
            $admission_no = $student['admissionNo'];

            $insertQuery = "INSERT IGNORE INTO allocations (room_id, admission_no) VALUES ($roomId, $admission_no)";
            $conn->query($insertQuery);
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
?>
