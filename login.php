<?php
session_start();

include 'includes/connect.php';

// Variabelen voor template
$error = '';
$old_username = '';

// Verwerk login vóórdat er HTML verstuurd wordt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $old_username = $username;

    if ($username === '' || $password === '') {
        $error = 'Vul gebruikersnaam en wachtwoord in.';
    } else {
        // Haal gebruiker op uit database
        $stmt = $conn->prepare('SELECT username, password FROM users WHERE username = :username LIMIT 1');
        $stmt->execute([':username' => $username]);
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vergelijk plaintext wachtwoord
        if ($users && ($password === $users['password'])) {
            // Login succesvol
            $_SESSION['username'] = $users['username'];

            // Redirect naar CMS-dashboard
            header('Location: cms/cms-home.php');
            exit;
        } else {
            $error = 'Ongeldige gebruikersnaam of wachtwoord.';
        }
    }
}

// Header includen NA login-verwerking
include 'includes/header.php';
?>

<div class="login">
  <div class="login-container">
      <h2>Login</h2>

      <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
      <?php endif; ?>

      <form action="login.php" method="POST">
          <label for="username" class="gegevens">Username:</label>
          <input type="text" id="username" name="username" placeholder="Enter your username" required class="gegevens_invoer"
                 value="<?php echo htmlspecialchars($old_username, ENT_QUOTES, 'UTF-8'); ?>"><br>

          <label for="password" class="gegevens">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required class="gegevens_invoer"><br>

          <button type="submit" class="aanmelden_button">Login</button>

          <p>Nog geen account? <a href="aanmelden.php" class="aanmelden_button">Registreer hier</a></p>
      </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>