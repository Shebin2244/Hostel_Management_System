<?php
include '../../connection/connection.php';

// Function to get room allocations and student details
function getRoomAllocations() {
    global $conn;

    $query = "SELECT rooms.room_name, hostel_student_list.name, hostel_student_list.branch
              FROM rooms
              LEFT JOIN allocations ON rooms.room_id = allocations.room_id
              LEFT JOIN hostel_student_list ON allocations.admission_no = hostel_student_list.admissionNo
              ORDER BY rooms.room_id, hostel_student_list.branch";
    $result = $conn->query($query);

    $roomAllocations = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roomName = $row['room_name'];
            $studentName = $row['name'];
            $branch = $row['branch'];

            if (!isset($roomAllocations[$roomName])) {
                $roomAllocations[$roomName] = array();
            }

            if (!isset($roomAllocations[$roomName][$branch])) {
                $roomAllocations[$roomName][$branch] = array();
            }

            if (count($roomAllocations[$roomName][$branch]) < 4) {
                $roomAllocations[$roomName][$branch][] = $studentName;
            }
        }
    }

    return $roomAllocations;
}

// Get and display room allocations
$roomAllocations = getRoomAllocations();


?>
