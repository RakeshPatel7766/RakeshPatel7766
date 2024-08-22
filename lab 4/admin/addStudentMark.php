<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect post data
    $studentId = $_POST['studentId'];
    $courseId = $_POST['courseId'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $gradeCode = $_POST['gradeCode'];

    // Include the config.php from the include directory
    require 'include/config.php'; // Path to the config file is now correct

    // Function to add student marks
    function addStudentMarks($studentId, $courseId, $year, $semester, $gradeCode) {
    global $DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME;

    // Create connection
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO achievement (studentid, courseid, year, semester, gradecode) VALUES (?, ?, ?, ?, ?)");
    
    // Check if prepare was successful
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("siiss", $studentId, $courseId, $year, $semester, $gradeCode);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

    // Call function to add marks
    addStudentMarks($studentId, $courseId, $year, $semester, $gradeCode);
}
?>
