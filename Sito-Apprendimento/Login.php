<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Spazio delle Competenze</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
      font-family: 'Orbitron', sans-serif;
      color: #FFFFFF;
      background: radial-gradient(circle at center, #0a0a23 0%, #0d001a 60%, #000000 100%);
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

    .login-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 2;
      background: rgba(10,10,30,0.8);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 30px #8e44ad;
      text-align: center;
    }

    .login-container h2 {
      margin-bottom: 20px;
      color: #FF00FF;
      text-shadow: 0 0 8px #FF00FF;
    }

    .login-container input {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: none;
      border-radius: 8px;
      background: #1e1e3f;
      color: #fff;
      font-size: 1rem;
    }

    .btn-login {
      font-size: 1.2rem;
      font-family: 'Orbitron', sans-serif;
      padding: 12px 25px;
      border: 2px solid #FF00FF;
      background: transparent;
      color: #FF00FF;
      text-decoration: none;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .btn-login:hover {
      background: #FF00FF;
      color: #000022;
      box-shadow: 0 0 10px rgba(255,255,255,0.8), 0 0 20px rgba(255,255,255,0.5);
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

  <div class="login-container">
    <h2>Accedi</h2>
    <form id="loginForm" action="dashboard.html" method="post">
      <input type="text" name="username" placeholder="Nome utente" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit" class="btn-login">Login</button>
    </form>
  </div>

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

  document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    clearInterval(intervalId);
    document.querySelectorAll('.floating-word').forEach(w => w.classList.add('fade-out'));
    setTimeout(() => this.submit(), 1000);
  });
</script>

</body>
</html>
