<?php require_once '../core/dbConfig.php'; ?>
<?php require_once '../core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Engineer</title>
</head>
<body>
    <h3>Are you sure you want to delete this engineer?</h3>
    <?php
        $engineer = getEngineerByID($pdo, $_GET['engineer_id']);
        if ($engineer) {
    ?>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($engineer['first_name']); ?></p>
        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($engineer['last_name']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($engineer['gender']); ?></p>
        <p><strong>Expertise Area:</strong> <?php echo htmlspecialchars($engineer['expertise_area']); ?></p>
        <p><strong>Years of Experience:</strong> <?php echo htmlspecialchars($engineer['experience_years']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($engineer['email']); ?></p>

        <form action="../core/handleForms.php?engineer_id=<?php echo $engineer['engineer_id']; ?>" method="POST">
            <input type="submit" name="deleteEngineerBtn" value="Yes, Delete">
            <a href="index.php">Cancel</a>
        </form>
    <?php
        } else {
            echo "<p>No engineer found.</p>";
        }
    ?>
</body>
</html>
