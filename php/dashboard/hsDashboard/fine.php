<!DOCTYPE html>
<html lang="en">
<?php
include "../../../connection/connection.php";
include "../../data_fetch.php";

// Handle fine insertion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'addFine') {
    $admissionNo = $_POST['admission_no'];
    $fineDate = $_POST['fine_date'];
    $reason = $_POST['reason'];

    $insertFineQuery = "INSERT INTO fine (admission_no, date, reason, status) VALUES ('$admissionNo', '$fineDate', '$reason', 'Pending')";
    $insertFineResult = mysqli_query($conn, $insertFineQuery);

    if ($insertFineResult) {
        echo "Fine added successfully";
        exit;
    } else {
        echo "Error adding fine: " . mysqli_error($conn);
        exit;
    }
}

// Handle fine deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'deleteFine') {
    $fineId = $_POST['fineId'];

    $deleteFineQuery = "DELETE FROM fine WHERE id = $fineId";
    $deleteFineResult = mysqli_query($conn, $deleteFineQuery);

    if ($deleteFineResult) {
        echo "Fine deleted successfully";
        exit;
    } else {
        echo "Error deleting fine: " . mysqli_error($conn);
        exit;
    }
}
?>

<head>
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
				initial-scale=1.0">
    <title>RIT Hostel</title>
    <link rel="stylesheet" href="../../../style/dash-style.css">
    <link rel="stylesheet" href="../../../style/responsive.css">
    <style>
    <!-- Meta tags and styles remain unchanged -->

    <style>
        /* Existing styles remain unchanged */

        .fine-form input {
            /* Adjust styles for the fine form input fields */
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <!-- Header section remains unchanged -->

    <div class="main-container">
        <?php include "../../../component/sidebar/hs.php"; ?>
        <div class="main">
            <div class="report-container">
                <br>
                <font color="blue" size="5px" style><b>+ Add Fine</b></font>
                <br> <br>
                <!-- Fine Form -->
                <form id="fineForm" class="fine-form" onsubmit="return addFine()">
                    <div class="fine-form">
                        <label for="admission_no">Admission No:</label>
                        <input type="text" id="admission_no" name="admission_no" required>

                        <label for="fine_date">Date:</label>
                        <input type="date" id="fine_date" name="fine_date" required>

                        <label for="reason">Reason:</label>
                        <input type="text" id="reason" name="reason" required>

                        <button type="submit">Add Fine</button>
                    </div>
                </form>

                <!-- Fetch and display fine data from the database -->
                <?php
                $fetchFinesQuery = "SELECT * FROM fine";
                $finesResult = mysqli_query($conn, $fetchFinesQuery);
                ?>
                <table>
                    <tr>
                        <th>Admission No</th>
                        <th>Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    if ($finesResult) {
                        while ($fine = mysqli_fetch_assoc($finesResult)) {
                    ?>
                            <tr>
                                <td><?php echo $fine['admission_no']; ?></td>
                                <td><?php echo $fine['date']; ?></td>
                                <td><?php echo $fine['reason']; ?></td>
                                <td><?php echo $fine['status']; ?></td>
                                <td class="edit-delete-buttons">
                                    <button onclick="deleteFine(<?php echo $fine['id']; ?>)">Delete</button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>

                <!-- Toast Message -->
                <div id="toastMessage" class="toast-message"></div>
            </div>
        </div>
    </div>

    <script>
        // Existing scripts remain unchanged

        function addFine() {
            var admissionNo = document.getElementById('admission_no').value;
            var fineDate = document.getElementById('fine_date').value;
            var reason = document.getElementById('reason').value;

            // Use AJAX to submit the form data to the server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo $_SERVER['PHP_SELF']; ?>');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    showToastMessage(xhr.responseText);
                } else {
                    showToastMessage('Error adding fine');
                }
            };
            xhr.send('action=addFine&admission_no=' + admissionNo + '&fine_date=' + fineDate + '&reason=' + reason);

            return false; // Prevent the form from submitting normally
        }

        function deleteFine(fineId) {
            // Use AJAX to send a request to delete the fine
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo $_SERVER['PHP_SELF']; ?>');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    showToastMessage(xhr.responseText);
                    // Remove the fine details from the UI if deletion is successful
                    var fineElement = document.getElementById('fine_' + fineId);
                    if (fineElement) {
                        fineElement.remove();
                    }
                } else {
                    showToastMessage('Error deleting fine');
                }
            };
            xhr.send('action=deleteFine&fineId=' + fineId);
        }
    </script>
    <script src="../../../style/dashboard.js"></script>
</body>

</html>
