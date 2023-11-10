<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
				initial-scale=1.0">
    <title>RIT Hostel</title>
    <link rel="stylesheet" href="../../../style/dash-style.css">
    <link rel="stylesheet" href="../../../style/responsive.css">
    <style>
    /* Style for the table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .box-container {
        display: flex;
        justify-content: space-between;
    }
    </style>
</head>

<body>

    <!-- for header part -->
    <header>

        <div class="logosec">
            <div class="logo">Hostel secretary Dashboard</div>
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
       include "../../../component/sidebar/hs.php";
       ?>
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
                    <h1 class="recent-Articles">Hs Dashboard</h1>
                    <button class="view">View All</button>
                </div>
                <div class="search-container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <input type="date" name="searchDate" id="searchDate" placeholder="Select a Date">
                    <button id="searchButton">Search</button>
                </form>
                </div>
                
              
<div class="report-body">
    
</div>

<script src="../../style/dashboard.js"></script>
<script>
    // JavaScript code for the "Mark Confirmation" button
    const markConfirmationButtons = document.querySelectorAll('.markConfirmationButton');
    
    markConfirmationButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get the attendance record ID from the data-id attribute
            const attendanceId = button.getAttribute('data-id');
            
            // Send an AJAX request to update the 'hs' field to 1
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_hs.php'); // Create a PHP script to handle the update
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Reload the page to reflect the updated data
                    location.reload();
                }
            };
            xhr.send('id=' + attendanceId);
        });
    });
</script>