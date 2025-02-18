<?php 


session_start();
include 'connection.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['USER_ID'])) {
        die("Please log in to apply for the job.");
    }

    $user_id = $_SESSION['USER_ID']; // Get logged-in user ID
    $job_id = $_POST['job_id']; // Get job ID from form

    // Check if user has already applied
    $checkQuery = "SELECT * FROM applied_jobs WHERE job_id = ?  AND  user_id = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ii",  $job_id,$user_id,);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("You have already applied for this job.");
    }

    // Insert application
    $query = "INSERT INTO applied_jobs (job_id, user_id, status, created_at) VALUES (?, ?, 'pending', NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $job_id, $user_id);

    if ($stmt->execute()) {
        echo "Application successful!";
    } else {
        echo "Error applying: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}


?>

