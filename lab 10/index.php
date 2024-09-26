<?php
// Database credentials
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "university_courses";  

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch semesters and courses
$sql = "
    SELECT semesters.name as semester_name, courses.course_code, courses.course_name
    FROM courses
    INNER JOIN semesters ON courses.semester_id = semesters.id
    ORDER BY semesters.id, courses.id;
";

$result = $conn->query($sql);

// HTML start
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Courses</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the external CSS file -->
</head>
<body>
    <header class="main-header">
        <h1>University Courses by Semester</h1>
        <button class="header-button">Explore Courses</button>
    </header>
    <div class="container">';

if ($result->num_rows > 0) {
    $current_semester = '';
    
    while ($row = $result->fetch_assoc()) {
        if ($current_semester != $row["semester_name"]) {
            if ($current_semester != '') {
                echo "</table>";
            }

            $current_semester = $row["semester_name"];
            echo "<h2 class='semester-title'>" . htmlspecialchars($current_semester) . "</h2>";
            echo "<table class='course-table'>
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                        </tr>
                    </thead>
                    <tbody>";
        }

        echo "<tr>
                <td>" . htmlspecialchars($row["course_code"]) . "</td>
                <td>" . htmlspecialchars($row["course_name"]) . "</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>No courses found.</p>";
}

echo '    </div>
</body>
</html>';

$conn->close();
?>
