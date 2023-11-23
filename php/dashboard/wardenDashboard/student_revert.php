<!DOCTYPE html>
<html lang="en">

<?php
include "../../../connection/connection.php";
include "../../data_fetch.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIT Hostel</title>
    <link rel="stylesheet" href="../../../style/dash-style.css">
    <link rel="stylesheet" href="../../../style/responsive.css">
    <style>
        /* Add the styles for the table */
        .report-container {
            width: 100%;
        }

        .report-body {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        .details-container {
            display: none;
            background-color: #f9f9f9;
        }

        .details-container td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .show-details-btn {
            background-color: #4caf50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Additional style for searchbar */
        .searchbar form {
            display: flex;
            gap: 10px;
        }

        /* Additional style for modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <div class="logosec">
            <div class="logo">Warden Dashboard</div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>
        <div class="searchbar">
            <input type="text" placeholder="Search">
            <div class="searchbtn">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn" alt="search-icon">
            </div>
        </div>
        <div class="message">
            <div class="circle"></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="">
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn" alt="dp">
            </div>
        </div>
    </header>

    <div class="main-container">
        <?php
        // Include your sidebar file
        include "../../../component/sidebar/warden.php";
        ?>

        <div class="report-container">
            <div class="report-header">
                <h1 class="recent-Articles">Registered Students</h1>
                <button class="view">Download</button>
            </div>

            <div class="searchbar">
                <form method="GET" action="">
                    <input type="text" name="search_name" placeholder="Search by Name">
                    <select name="search_degree">
                        <option value="">Select Degree</option>
                        <option value="B.Tech">B.Tech</option>
                        <option value="M.Tech">M.Tech</option>
                        <option value="MCA">MCA</option>
                        <!-- Add more options as needed -->
                    </select>
                    <select name="search_semester">
                        <option value="">Select Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                    <button type="submit" class="searchbtn">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                            class="icn srchicn" alt="search-icon">
                    </button>
                </form>
            </div>

            <div class="report-body">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Admission Number</th>
                            <th>Year of Study</th>
                            <th>Semester</th>
                            <th>Branch</th>
                            <th>Degree</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch data from the database based on search criteria
                        $search_name = isset($_GET['search_name']) ? mysqli_real_escape_string($conn, $_GET['search_name']) : '';
                        $search_degree = isset($_GET['search_degree']) ? mysqli_real_escape_string($conn, $_GET['search_degree']) : '';
                        $search_semester = isset($_GET['search_semester']) ? mysqli_real_escape_string($conn, $_GET['search_semester']) : '';

                        $query = "SELECT * FROM hostel_student_list WHERE 1";

                        if (!empty($search_name)) {
                            $query .= " AND name LIKE '%$search_name%'";
                        }

                        if (!empty($search_degree)) {
                            $query .= " AND degree = '$search_degree'";
                        }

                        if (!empty($search_semester)) {
                            $query .= " AND semester = '$search_semester'";
                        }

                        $result = mysqli_query($conn, $query);

                        // Check if the query was successful
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {

                                // Loop through each row in the result set
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Output the data in the table rows
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['admissionNo']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['yearOfStudy']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['semester']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['branch']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['degree']) . '</td>';

                                    echo '<td><button class="show-details-btn">Show Details</button></td>';
                                    echo '</tr>';
                                    echo '<tr class="details-container">';
                                    // Add more details here based on your table structure
                                    echo '<td colspan="6">';
                                    echo '<p>Gender: ' . htmlspecialchars($row['gender']) . '</p>';
                                    echo '<p>Degree: ' . htmlspecialchars($row['degree']) . '</p>';
                                    echo '<p>Permanent Address: ' . htmlspecialchars($row['pAddress']) . '</p>';
                                    echo '<p>Guardian Address: ' . htmlspecialchars($row['gAddress']) . '</p>';
                                    echo '<p>Pincode: ' . htmlspecialchars($row['pincode']) . '</p>';
                                    echo '<p>Mobile: ' . htmlspecialchars($row['mobile']) . '</p>';
                                    // echo '<p>Guardian Mobile: ' . htmlspecialchars($row['gMobile']) . '</p>';
                                    // echo '<p>Present Address: ' . htmlspecialchars($row['prAddress']) . '</p>';
                                    // echo '<p>P1: ' . htmlspecialchars($row['p1']) . '</p>';
                                    // echo '<p>P2: ' . htmlspecialchars($row['p2']) . '</p>';
                                    // echo '<p>Other: ' . htmlspecialchars($row['other']) . '</p>';
                                    // echo '<p>Annual Income: ' . htmlspecialchars($row['aIncome']) . '</p>';
                                    // echo '<p>OBC or OEC: ' . htmlspecialchars($row['obcOrOec']) . '</p>';
                                    // echo '<p>Distance: ' . htmlspecialchars($row['distance']) . '</p>';
                                    // echo '<p>SGPA1: ' . htmlspecialchars($row['sgpa1']) . '</p>';
                                    // ... add more details as needed
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                // Display a message when there are no matching records
                                echo '<tr><td colspan="7">No matching records found</td></tr>';
                            }
                        } else {
                            // Handle the case where the query fails
                            echo 'Error fetching data: ' . mysqli_error($connection);
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeUpdateModal">&times;</span>
            <h2>Update Student Details</h2>
            <!-- Update form with fields -->
            <form id="updateForm">
                <label for="updateName">Name:</label>
                <input type="text" id="updateName" name="updateName" required><br>
                <label for="updateName">Name:</label>
                <input type="text" id="updateName" name="updateName" required><br>
                <label for="updateName">Name:</label>
                <input type="text" id="updateName" name="updateName" required><br>
                <label for="updateName">Name:</label>
                <input type="text" id="updateName" name="updateName" required><br>
                <label for="updateName">Name:</label>
                <input type="text" id="updateName" name="updateName" required><br>
                <label for="updateName">Name:</label>
                <input type="text" id="updateName" name="updateName" required><br>
                <label for="updateName">Name:</label>
                <input type="text" id="updateName" name="updateName" required><br>

                <!-- Add more fields as needed -->
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <script src="../../../style/dashboard.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var showDetailsBtns = document.querySelectorAll('.show-details-btn');
            var updateModal = document.getElementById('updateModal');
            var closeUpdateModalBtn = document.getElementById('closeUpdateModal');
            var updateForm = document.getElementById('updateForm');
            var updateNameInput = document.getElementById('updateName');

            showDetailsBtns.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var detailsContainer = this.parentElement.parentElement.nextElementSibling;
                    detailsContainer.style.display = (detailsContainer.style.display === 'table-row') ? 'none' : 'table-row';

                    // Get existing data and populate the form fields
                    var name = detailsContainer.querySelector('td:first-child').textContent;
                    // Get other fields as needed

                    updateNameInput.value = name;
                    // Populate other fields

                    // Show the update modal
                    updateModal.style.display = 'block';
                });
            });

            // Close the modal when the close button is clicked
            closeUpdateModalBtn.addEventListener('click', function () {
                updateModal.style.display = 'none';
            });

            // Close the modal if the user clicks outside the modal
            window.addEventListener('click', function (event) {
                if (event.target == updateModal) {
                    updateModal.style.display = 'none';
                }
            });

            // Submit the update form (you need to implement the backend logic for updating data)
            updateForm.addEventListener('submit', function (event) {
                event.preventDefault();
                // Add logic to submit the form data to the backend for updating
                // You can use AJAX or other methods to send the data
                // After successful update, close the modal and possibly refresh the table
                updateModal.style.display = 'none';
                // Example: Call a function to update the data in the backend
                updateData(updateNameInput.value);
            });

            function updateData(updatedName) {
                // Example: You need to implement the backend logic to update the data
                // You can use AJAX to send the updated data to the server
                // and update the database
                // For simplicity, this is just a console log statement
                console.log('Updating data:', updatedName);
                // You may want to refresh the table or take other actions after updating data
            }
        });
    </script>
</body>

</html>
