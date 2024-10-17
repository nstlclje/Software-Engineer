<?php require_once '../core/dbConfig.php'; ?>
<?php require_once '../core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Engineer</title>
</head>
<body>
    <h3>Edit Engineer Information</h3>
    <?php $engineer = getEngineerByID($pdo, $_GET['engineer_id']); ?>
    <form action="../core/handleForms.php?engineer_id=<?php echo $engineer['engineer_id']; ?>" method="POST">
        <p><label for="firstName">First Name</label> <input type="text" name="firstName" value="<?php echo $engineer['first_name']; ?>"></p>
        <p><label for="lastName">Last Name</label> <input type="text" name="lastName" value="<?php echo $engineer['last_name']; ?>"></p>
        <p><label for="gender">Gender</label> <input type="text" name="gender" value="<?php echo $engineer['gender']; ?>"></p>
        <p><label for="expertiseArea">Expertise Area</label> <input type="text" name="expertiseArea" value="<?php echo $engineer['expertise_area']; ?>"></p>
        <p><label for="experienceYears">Years of Experience</label> <input type="number" name="experienceYears" value="<?php echo $engineer['experience_years']; ?>"></p>
        <p><label for="email">Email</label> <input type="email" name="email" value="<?php echo $engineer['email']; ?>">
            <input type="submit" name="editEngineerBtn" value="Update">
        </p>
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
