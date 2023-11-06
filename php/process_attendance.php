<?php
session_start(); // Start the session
$admission = $_SESSION['username'];
session_start();
$_SESSION['attendance_message'] = "Attendance has been marked successfully.";

// Include the database connection file
include '../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $attendanceType = $_POST['attendance_type']; // 'morning' or 'night'
    $currentDate = date('Y-m-d H:i:s'); // Get the current date and time

    // Retrieve student details based on the admission number
    $sql = "SELECT * FROM hostel_student_list WHERE admissionNo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $admission);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $branch = $row['branch'];
            $semester = $row['semester'];

            // Insert the attendance record into the database
            $insertSql = "INSERT INTO attendance (name, admission_no, branch, semester, $attendanceType, date) VALUES (?, ?, ?, ?, 1, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("sssds", $name, $admission, $branch, $semester, $currentDate);

            if ($insertStmt->execute()) {
                echo "Attendance marked successfully.";
                header("Location: dashboard/student_dashboard.php"); // Redirect to the page where the toast will be displayed

            } else {
                echo "Error: " . $insertStmt->error;
            }

            $insertStmt->close();
        } else {
            echo "Student with admission number $admission not found.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

?>
