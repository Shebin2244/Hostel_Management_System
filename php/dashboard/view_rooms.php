<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
				initial-scale=1.0">
    <title>RIT Hostel</title>
    <link rel="stylesheet" href="../../style/dash-style.css">
    <link rel="stylesheet" href="../../style/responsive.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .room-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .room {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            width: 300px;
            margin-bottom: 20px;
        }

        .room h3 {
            margin: 0;
            font-size: 20px;
            text-decoration: underline;
        }

        .students {
            margin-top: 10px;
            list-style-type: none;
            padding: 0;
        }

        .student {
            margin-bottom: 5px;
        }

        .program {
            font-weight: bold;
        }

    </style>
</head>

<body>

    <!-- for header part -->
    <header>

        <div class="logosec">
            <div class="logo">Matron Dashboard</div>
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
                <a href="matron_dashboard.php" class="option2 nav-option">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                                class="nav-img" alt="articles">
                            <h3>Room Allocation</h3>
                        </a>

                    <a href="view_rooms.php" class="option2 nav-option">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                                class="nav-img" alt="articles">
                            <h3>View Rooms</h3>
                        </a>    

                    <div class="nav-option option3">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" alt="report">
                        <h3> Report</h3>
                    </div>

                    <div class="nav-option option4">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                            class="nav-img" alt="institution">
                        <h3> Institution</h3>
                    </div>

                    <div class="nav-option option5">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                            class="nav-img" alt="blog">
                        <h3> Profile</h3>
                    </div>

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

    <h1>Room Allocation View</h1>
    
    <?php
    // Include the PHP script here
    include 'room_allocation_script.php';
    
    // Get and display room allocations
    $roomAllocations = getRoomAllocations();

    echo '<div class="room-container">';
    foreach ($roomAllocations as $roomName => $allocations) {
        echo '<div class="room">';
        echo '<h3>Room: ' . $roomName . '</h3>';

        echo '<ul class="students">';
        foreach ($allocations as $program => $students) {
            echo '<li class="student">';
            echo '<span class="program">Program: ' . $program . '</span>';
            echo '<ul>';
            foreach ($students as $student) {
                echo '<li>' . $student . '</li>';
            }
            echo '</ul>';
            echo '</li>';
        }
        echo '</ul>';

        echo '</div>';
    }
    echo '</div>';
    ?>



    <script src="../../style/dashboard.js"></script>
</body>

</html>