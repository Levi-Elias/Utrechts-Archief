<?php 
include 'includes/header.php';
include 'includes/connect.php';

if (isset($_GET['username']) && isset($_GET['password']) && !empty($_GET['username']) && !empty($_GET['password'])) {
    $username = htmlspecialchars($_GET['username']);
    $password = htmlspecialchars($_GET['password']);
    $last_login = date('Y-m-d H:i:s');

      $stmt = $conn->prepare("INSERT INTO users (username, password, last_login)
  VALUES (:username, :password, :last_login)");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);
  $stmt->bindParam(':last_login', $last_login);

  // insert a row
  $stmt->execute();
    echo "Registratie succesvol! Je kunt nu <a href='login.php'>inloggen</a>.";
}
?>

<div class="login">
<div class="login-container">
    <h2>aanmelden</h2>
    <form action="aanmelden.php" method="GET">
        <label for="username" class="gegevens">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required class="gegevens_invoer"><br>
        
        <label for="password" class="gegevens">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required class="gegevens_invoer"><br>

        <button type="submit" class="aanmelden_button">aanmelden</button>
    </form>
    
</div>
</div>

<?php include 'includes/footer.php';?>