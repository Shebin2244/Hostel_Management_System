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
    <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-top">
                        <a href="warden_dashboard.php" class="nav-option">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                                class="nav-img" alt="dashboard">
                            <h3> Dashboard</h3>
                        </a>
    
                        <a href="registered_students.php" class="nav-option">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                                class="nav-img" alt="articles">
                            <h3> Registered Students</h3>
                        </a>
    
                        <a href="finalized_students.php" class="active nav-option">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                                class="nav-img" alt="articles">
                            <h3> Finalized Students</h3>
                        </a>
    
                        <a href="attendance.php" class="nav-option">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                                class="nav-img" alt="articles">
                            <h3>Attendance</h3>
                        </a>
    
                        <a href="complaints.php" class="nav-option">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                                class="nav-img" alt="articles">
                            <h3>Complaints</h3>
                        </a>
    
                        <a href="foodmenu.php" class="nav-option">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                                class="nav-img" alt="articles">
                            <h3>Food Menu</h3>
                        </a>
    
                        <a href="food_feedback.php" class="nav-option">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                                class="nav-img" alt="articles">
                            <h3>Food Feedback</h3>
                        </a>

                    </div>

                    <div class="navbar-bottom">
                        <div class="nav-option option6">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                                class="nav-img" alt="settings">
                            <h3> Settings</h3>
                        </div>
    
                        <div class="nav-option logout">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                                class="nav-img" alt="logout">
                            <h3>Logout</h3>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        <div class="main">

            <div class="searchbar2">
                <input type="text" name="" id="" placeholder="Search">
                <div class="searchbtn">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                        class="icn srchicn" alt="search-button">
                </div>
            </div>

            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Finalized Students</h1>
                    <a href="../../hostel_student_result.php"><button class="view">Generate</button></a>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">Name</h3>
                        <h3 class="t-op">Admission number</h3>
                        <h3 class="t-op">Year of study</h3>
                        <h3 class="t-op">semester</h3>
                        <h3 class="t-op">branch</h3>
                    </div>

<!-- Add the following code after the existing PHP includes -->
<!-- Add the following code after the existing PHP includes -->
<?php
// Assuming $connection is your database connection variable

// Fetch data from the database
$query = "SELECT name, admissionNo, semester, branch, yearOfStudy FROM hostel_student_list";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Loop through each row in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Output the data in the HTML structure for each row
        echo '<div class="item1">';
        echo '<h3 class="t-op-nextlvl">' . htmlspecialchars($row['name']) . '</h3>';
        echo '<h3 class="t-op-nextlvl">' . htmlspecialchars($row['admissionNo']) . '</h3>';
        
        echo '<h3 class="t-op-nextlvl">' . htmlspecialchars($row['yearOfStudy']) . '</h3>';
        echo '<h3 class="t-op-nextlvl">' . htmlspecialchars($row['semester']) . '</h3>';
        echo '<h3 class="t-op-nextlvl">' . htmlspecialchars($row['branch']) . '</h3>';
        echo '</div>';
    }
} else {
    // Handle the case where the query fails
    echo 'Error fetching data: ' . mysqli_error($connection);
}

// Close the database connection
// mysqli_close($connection);
?>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../style/dashboard.js"></script>
</body>

</html>