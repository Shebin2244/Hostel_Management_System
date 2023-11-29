<?php
include '../../../connection/connection.php';

// Function to allocate rooms to students
function allocateRooms($degree, $students)
{
    global $conn;

    // Fetch available rooms for the given degree
    $roomQuery = "SELECT * FROM rooms WHERE capacity >= 4";
    $roomResult = mysqli_query($conn, $roomQuery);

    if ($roomResult) {
        $rooms = mysqli_fetch_all($roomResult, MYSQLI_ASSOC);

        foreach ($students as $student) {
            // Check if the student is already assigned a room
            $existingAllocationQuery = "SELECT * FROM allocations WHERE admission_no = '{$student['admissionNo']}'";
            $existingAllocationResult = mysqli_query($conn, $existingAllocationQuery);

            if (!$existingAllocationResult || mysqli_num_rows($existingAllocationResult) === 0) {
                // Find the next available room for the current degree
                $room = findAvailableRoom($rooms, $degree);

                if ($room) {
                    $room_id = $room['room_id'];
                    $admission_no = $student['admissionNo'];

                    // Insert the allocation into the allocations table
                    $insertQuery = "INSERT INTO allocations (room_id, admission_no) VALUES ('$room_id', '$admission_no')";
                    $insertResult = mysqli_query($conn, $insertQuery);

                    if (!$insertResult) {
                        // Handle the case where the insertion fails
                        echo "Error inserting allocation for student $admission_no. Please try again.";
                        exit();
                    }

                    // If room is full, remove it from the available rooms
                    if (countCurrentOccupancy($conn, $room_id) >= 4) {
                        $rooms = array_filter($rooms, function ($r) use ($room_id) {
                            return $r['room_id'] != $room_id;
                        });
                    }
                } else {
                    // Handle the case where there are not enough available rooms
                    echo "Not enough available rooms for students in degree $degree.";
                    exit();
                }
            }
        }
    } else {
        // Handle the case where fetching rooms fails
        echo "Error fetching rooms for degree $degree. Please try again.";
        exit();
    }

    // Display completion message
    echo "Room allocation for $degree completed successfully.";
}

// Function to find available room for the given degree
function findAvailableRoom(&$rooms, $degree)
{
    foreach ($rooms as $room) {
        $room_id = $room['room_id'];
        include '../../../connection/connection.php';

        // Check if the room has the same branch students
        $existingAllocationQuery = "SELECT * FROM allocations a JOIN hostel_student_list s ON a.admission_no = s.admissionNo WHERE a.room_id = '$room_id' AND s.degree = '$degree'";
        $existingAllocationResult = mysqli_query($conn, $existingAllocationQuery);

        if ($existingAllocationResult && countCurrentOccupancy($conn, $room_id) < 4) {
            // If the room has capacity for the current branch, return the room
            return $room;
        } elseif (!$existingAllocationResult) {
            // Handle the case where fetching existing allocations fails
            echo "Error fetching existing allocations. Please try again.";
            exit();
        }
    }

    return null;
}

// Function to count the current occupancy of a room
function countCurrentOccupancy($conn, $room_id)
{
    $occupancyQuery = "SELECT COUNT(*) as occupancy FROM allocations WHERE room_id = '$room_id'";
    $occupancyResult = mysqli_query($conn, $occupancyQuery);

    if ($occupancyResult) {
        $occupancyData = mysqli_fetch_assoc($occupancyResult);
        return $occupancyData['occupancy'];
    } else {
        // Handle the case where fetching occupancy fails
        echo "Error fetching room occupancy. Please try again.";
        exit();
    }
}

// Fetch students by degree
$degrees = ['B.Tech', 'M.Tech', 'B.Arch', 'MCA'];

foreach ($degrees as $degree) {
    $studentQuery = "SELECT * FROM hostel_student_list WHERE degree = '$degree' LIMIT 4";
    $studentResult = mysqli_query($conn, $studentQuery);

    if ($studentResult) {
        $students = mysqli_fetch_all($studentResult, MYSQLI_ASSOC);

        // Allocate rooms for the current degree
        allocateRooms($degree, $students);
    } else {
        // Handle the case where fetching students fails
        echo "Error fetching students for degree $degree. Please try again.";
        exit();
    }
}

// Redirect back to the Matron Dashboard or any other appropriate page
header('Location: matron_dashboard.php');
exit();
?>
