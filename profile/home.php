<?php

// Include database connection details (replace with your credentials)
require('db_connect.php');

// Prepare SQL statement to retrieve users
$sql = "SELECT username, email FROM users";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo "Error: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
</head>
<body>

<h1>Registered Users</h1>

<?php if (mysqli_num_rows($result) > 0): ?>

  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['email']; ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

<?php else: ?>
  <p>No users registered yet.</p>
<?php endif; ?>

<?php mysqli_close($conn); ?>

</body>
</html>
