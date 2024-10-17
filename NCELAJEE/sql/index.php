<?php 
require_once '../core/dbConfig.php'; 
require_once '../core/models.php'; 
require_once '../core/handleForms.php';  // Make sure this path is correct!
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Engineer Registration</title>
    <style>
        body {
            font-family: "Arial";
        }
        input {
            font-size: 1.5em;
            height: 50px;
            width: 200px;
        }
        table, th, td {
            border: 1px solid black;
        }
        .message {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<h3>Welcome to the Software Engineer Registration System. Input your details here to register</h3>

<!-- Display success or error messages -->
<?php if ($successMessage): ?>
    <p class="message"><?php echo $successMessage; ?></p>
<?php endif; ?>
<?php if ($error): ?>
    <p class="error"><?php echo $error; ?></p>
<?php endif; ?>

<form action="" method="POST"> <!-- No action attribute means it submits to the current page -->
    <p><label for="firstName">First Name</label> <input type="text" name="firstName"></p>
    <p><label for="lastName">Last Name</label> <input type="text" name="lastName"></p>
    <p><label for="gender">Gender</label> <input type="text" name="gender"></p>
    <p><label for="expertiseArea">Expertise Area</label> <input type="text" name="expertiseArea"></p>
    <p><label for="experienceYears">Years of Experience</label> <input type="number" name="experienceYears"></p>
    <p><label for="email">Email</label> <input type="email" name="email">
        <input type="submit" name="insertNewEngineerBtn">
    </p>
</form>

<table style="width:50%; margin-top: 50px;">
  <tr>
    <th>Engineer ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Expertise Area</th>
    <th>Years of Experience</th>
    <th>Email</th>
    <th>Action</th>
  </tr>

  <?php foreach ($seeAllEngineerRecords as $row) { ?>
  <tr>
      <td><?php echo $row['engineer_id']; ?></td>
      <td><?php echo $row['first_name']; ?></td>
      <td><?php echo $row['last_name']; ?></td>
      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['expertise_area']; ?></td>
      <td><?php echo $row['experience_years']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td>
    <a href="editEngineer.php?engineer_id=<?php echo $row['engineer_id'];?>">Edit</a>
    <a href="deleteEngineer.php?engineer_id=<?php echo $row['engineer_id'];?>">Delete</a>
</td>
  </tr>
  <?php } ?>
</table>

</body>
</html>