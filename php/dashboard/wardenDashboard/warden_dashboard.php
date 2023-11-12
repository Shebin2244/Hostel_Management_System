<!DOCTYPE html>
<html lang="en">
<?php
include "../../../connection/connection.php";
include "../../data_fetch.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
				initial-scale=1.0">
    <title>RIT Hostel</title>
    <link rel="stylesheet" href="../../../style/dash-style.css">
    <link rel="stylesheet" href="../../../style/responsive.css">
</head>

<body>

    <!-- for header part -->
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
        <div class="main">

            <div class="searchbar2">
                <input type="text" name="" id="" placeholder="Search">
                <div class="searchbtn">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                        class="icn srchicn" alt="search-button">
                </div>
            </div>

            <div class="box-container">

                <div class="box box1">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $totalStudents; ?></h2>
                        <h2 class="topic">Registered student</h2>
                    </div>
                </div>

                <div class="box box2">
                    <div class="text">
                    <h2 class="topic-heading"><?php echo $totalStudents1; ?></h2>
                        <h2 class="topic">Alloted Students</h2>
                    </div>

                    <!-- <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png" alt="likes"> -->
                </div>

                <div class="box box3">
                    <div class="text">
                        <h2 class="topic-heading">320</h2>
                        <h2 class="topic">Comments</h2>
                    </div>

                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
                        alt="comments">
                </div>

                <div class="box box4">
                    <div class="text">
                        <h2 class="topic-heading">70</h2>
                        <h2 class="topic">Published</h2>
                    </div>

                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
                </div>
            </div>

            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Alloted Students</h1>
                    <button class="view">Download</button>
                </div>

                <div class="report-body">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Admission No</th>
                            <th>Branch</th>
                            <th>Semester</th>
                            <th>Morning</th>
                            <th>Night</th>
                        </tr>
                        <?php
        
        // Include your connection.php file
        include '../../../connection/connection.php';

        // Initialize the searchDate with the current date
        $searchDate = date("Y-m-d");

        // Check if a date is provided in the search
        if (isset($_GET['searchDate'])) {
            $searchDate = $_GET['searchDate'];
        }

        // Select data from the attendance table based on the searchDate
        $query = "SELECT * FROM attendance WHERE date = '$searchDate'";
        $result = mysqli_query($conn, $query);


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['admission_no'] . "</td>";
            echo "<td>" . $row['branch'] . "</td>";
            echo "<td>" . $row['semester'] . "</td>";
            
            // Check the 'morning' value
            if ($row['morning'] == 1) {
                // Display "Present" with a green background
                echo "<td style='background-color: green;'>Present</td>";
            } else {
                // Display "Absent" with a red background
                echo "<td style='background-color: red;'>Absent</td>";
            }
            
            // Check the 'night' value (you can do the same for 'night' as for 'morning')
            if ($row['night'] == 1) {
                echo "<td style='background-color: green;'>Present</td>";
            } else {
                echo "<td style='background-color: red;'>Absent</td>";
            }
            
            echo "</tr>";
        }
        ?>

                    </table>





                </div>
            </div>
        </div>
    </div>

    <script src="../../../style/dashboard.js"></script>
    <script>
        document.getElementById("searchButton").addEventListener("click", function() {
            // Get the selected date from the input field
            var searchDate = document.getElementById("searchDate").value;

            // Redirect to the page with the selected date as a parameter
            window.location.href = "hostel_secretary_dashboard.php?searchDate=" + searchDate;
        });
    </script>

</body>

</html>