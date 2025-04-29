<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Spazio delle Competenze</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
  <style>
  body {
    margin: 0;
    padding: 0;
    overflow: hidden;
    font-family: 'Orbitron', sans-serif;
    color: #FFFFFF;
    background: radial-gradient(circle at center, #0a0a23 0%, #0d001a 60%, #000000 100%);
    background-attachment: fixed;
  }

  body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    box-shadow:
      inset 0 0 150px rgba(0, 0, 0, 0.8),
      inset 0 0 300px rgba(0, 0, 50, 0.6);
    pointer-events: none;
    z-index: 0;
  }

  .main-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 2;
  }

  .title {
    font-size: 4rem;
    margin: 0 0 20px 0;
    color: #FF00FF;
    text-shadow: 0 0 5px #FF00FF, 0 0 15px #FF00FF;
  }

  .description {
    font-size: 1.5rem;
    margin: 0 0 30px 0;
    color: #C0C0C0;
  }

  .buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
  }

  .btn {
    font-size: 1.2rem;
    font-family: 'Orbitron', sans-serif;
    padding: 12px 25px;
    border: 2px solid #FF00FF;
    background: transparent;
    color: #FF00FF;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .btn:hover {
    background: #FF00FF;
    color: #000022;
    box-shadow: 0 0 10px rgba(255,255,255,0.8), 0 0 20px rgba(255,255,255,0.5);
  }

  footer {
    position: fixed;
    bottom: 10px;
    width: 100%;
    text-align: center;
    font-size: 0.9rem;
    color: #AAAAAA;
    z-index: 2;
  }

  .floating-word {
  position: fixed;
  white-space: nowrap;
  top: 50%;
  pointer-events: none;
  opacity: 0.7;
  font-weight: bold;
  font-family: 'Orbitron', sans-serif;
  z-index: 1;
  transition: opacity 1s ease-in-out;
}

.floating-word.fade-out {
  opacity: 0;
}

@keyframes moveWordLeftToRight {
  0% { left: -200px; }
  100% { left: 100vw; }
}

@keyframes moveWordRightToLeft {
  0% { left: 100vw; }
  100% { left: -200px; }
}

</style>

</head>
<body>

<div class="main-container">
  <h1 class="title">Esplora il Cosmo delle Competenze</h1>
  <p class="description">Impara geografia, vocaboli, matematica, inglese e coding in un'esperienza visiva spaziale.</p>
  <div class="buttons">
    <a href="Register.php" class="btn">Registrazione</a>
    <a href="Login.php" class="btn">Login</a>
  </div>
</div>

<footer>© 2025 Spazio delle Competenze. Tutti i diritti riservati.</footer>

<script>
  const parole = [
    "matematica", "π", "geografia", "vocaboli", "∞", "x²", "if", "else",
    "while", "function", "true", "false", "London", "Roma", "Tokyo",
    "coding", "HTML", "CSS", "JavaScript", "algoritmo", "derivata",
    "variabile", "boolean", "int", "Africa", "Asia", "Europe"
  ];

  function getRandomColor() {
    const colors = ["#8e44ad", "#3498db", "#f39c12", "#1abc9c", "#e74c3c", "#2ecc71", "#9b59b6"];
    return colors[Math.floor(Math.random() * colors.length)];
  }

  function createFloatingWord() {
    const word = document.createElement('div');
    word.className = 'floating-word';
    word.innerText = parole[Math.floor(Math.random() * parole.length)];

    const startTop = Math.random() * (window.innerHeight - 100);
    const direction = Math.random() > 0.5 ? 'moveWordLeftToRight' : 'moveWordRightToLeft';
    const duration = 8 + Math.random() * 7;
    const fontSize = 1 + Math.random() * 2.5;

    word.style.top = `${startTop}px`;
    word.style.animation = `${direction} ${duration}s linear infinite`;
    word.style.fontSize = `${fontSize}rem`;
    word.style.color = getRandomColor();

    document.body.appendChild(word);

    setTimeout(() => word.remove(), duration * 1000);
  }

  const intervalId = setInterval(createFloatingWord, 300);

  // Rimuove parole e reindirizza
  function handleTransition(targetPage) {
    clearInterval(intervalId);
    document.querySelectorAll('.floating-word').forEach(w => w.classList.add('fade-out'));
    setTimeout(() => {
      window.location.href = targetPage;
    }, 1000);
  }

  // Associa gli eventi ai bottoni
  document.querySelectorAll('.btn').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      const target = btn.innerText.toLowerCase().includes("login") ? "Login.php" : "Register.php";
      handleTransition(target);
    });
  });
</script>




</body>
</html>
