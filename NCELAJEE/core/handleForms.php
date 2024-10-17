<?php 
require_once 'dbConfig.php'; 
require_once 'models.php';

$error = '';
$successMessage = '';

// Handle insertion
if (isset($_POST['insertNewEngineerBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $expertiseArea = trim($_POST['expertiseArea']);
    $experienceYears = trim($_POST['experienceYears']);
    $email = trim($_POST['email']);

    if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($expertiseArea) && !empty($experienceYears) && !empty($email)) {
        $query = insertIntoEngineerRecords($pdo, $firstName, $lastName, $gender, $expertiseArea, $experienceYears, $email);
        
        if ($query) {
            $successMessage = "Engineer registered successfully!";
        } else {
            $error = "Insertion failed";
        }
    } else {
        $error = "Make sure that no fields are empty";
    }
}

// Handle update
if (isset($_POST['editEngineerBtn'])) {
    $engineer_id = $_GET['engineer_id'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $expertiseArea = trim($_POST['expertiseArea']);
    $experienceYears = trim($_POST['experienceYears']);
    $email = trim($_POST['email']);

    if (!empty($engineer_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($expertiseArea) && !empty($experienceYears) && !empty($email)) {
        $query = updateAnEngineer($pdo, $engineer_id, $firstName, $lastName, $gender, $expertiseArea, $experienceYears, $email);
        
        if ($query) {
            $successMessage = "Engineer updated successfully!";
            header("Location: ../sql/index.php"); // Redirect to index.php after successful update
            exit();
        } else {
            $error = "Update failed";
        }
        
    } else {
        $error = "Make sure that no fields are empty";
    }
}

// Handle deletion
if (isset($_POST['deleteEngineerBtn'])) {
    $query = deleteAnEngineer($pdo, $_GET['engineer_id']);
    if ($query) {
        $successMessage = "Engineer deleted successfully!";
        header("Location: ../sql/index.php"); // Redirect to index.php after successful deletion
        exit();
    } else {
        $error = "Deletion failed";
    }
    
}

// Get all records for display
$seeAllEngineerRecords = seeAllEngineerRecords($pdo);
?>