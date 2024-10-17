<?php 
require_once 'dbConfig.php';

function insertIntoEngineerRecords($pdo, $first_name, $last_name, $gender, $expertise_area, $experience_years, $email) {
    $sql = "INSERT INTO software_engineer_records (first_name, last_name, gender, expertise_area, experience_years, email) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $gender, $expertise_area, $experience_years, $email]);
    return $executeQuery;
}

function seeAllEngineerRecords($pdo) {
    $sql = "SELECT * FROM software_engineer_records";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    return $executeQuery ? $stmt->fetchAll() : [];
}

function getEngineerByID($pdo, $engineer_id) {
    $sql = "SELECT * FROM software_engineer_records WHERE engineer_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$engineer_id]) ? $stmt->fetch() : null;
}

function updateAnEngineer($pdo, $engineer_id, $first_name, $last_name, $gender, $expertise_area, $experience_years, $email) {
    $sql = "UPDATE software_engineer_records SET first_name = ?, last_name = ?, gender = ?, expertise_area = ?, experience_years = ?, email = ? WHERE engineer_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $gender, $expertise_area, $experience_years, $email, $engineer_id]);
}

function deleteAnEngineer($pdo, $engineer_id) {
    $sql = "DELETE FROM software_engineer_records WHERE engineer_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$engineer_id]);
}
?>