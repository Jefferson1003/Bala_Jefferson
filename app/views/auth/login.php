<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #1e3c72, #2a5298); /* deep sky blue */
      overflow: hidden;
    }

    /* Bubbles Background */
    .bubbles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      overflow: hidden;
    }
    .bubbles span {
      position: absolute;
      bottom: -150px;
      width: 40px;
      height: 40px;
      background: rgba(255,255,255,0.15);
      border-radius: 50%;
      animation: rise 20s infinite ease-in;
    }
    .bubbles span:nth-child(1){ left:10%; width:60px; height:60px; animation-duration:25s; }
    .bubbles span:nth-child(2){ left:20%; animation-duration:18s; animation-delay:2s;}
    .bubbles span:nth-child(3){ left:25%; width:80px; height:80px; animation-duration:22s; }
    .bubbles span:nth-child(4){ left:40%; animation-duration:20s; animation-delay:3s;}
    .bubbles span:nth-child(5){ left:55%; width:50px; height:50px; animation-duration:17s;}
    .bubbles span:nth-child(6){ left:70%; width:90px; height:90px; animation-duration:30s;}
    .bubbles span:nth-child(7){ left:80%; animation-duration:19s; animation-delay:4s;}
    .bubbles span:nth-child(8){ left:90%; width:70px; height:70px; animation-duration:26s;}

    @keyframes rise {
      0% { transform: translateY(0) scale(1); opacity: 0.5; }
      50% { opacity: 0.8; }
      100% { transform: translateY(-1200px) scale(1.5); opacity: 0; }
    }

    /* Login Card - glass effect */
    .login {
      position: relative;
      width: 380px;
      padding: 45px 35px;
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      z-index: 1;
      animation: slideUp 0.7s ease-in-out;
    }

    @keyframes slideUp {
      from { transform: translateY(40px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 700;
      margin-bottom: 25px;
      color: #fff;
      text-shadow: 0 2px 6px rgba(0,0,0,0.4);
    }

    .inputBox {
      position: relative;
      margin-bottom: 25px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 50px 14px 15px;
      font-size: 1em;
      color: #fff;
      background: rgba(255,255,255,0.15);
      border: 1px solid rgba(255,255,255,0.3);
      outline: none;
      border-radius: 12px;
      transition: 0.3s;
    }

    .inputBox input:focus {
      border: 1px solid #4fa3f7;
      box-shadow: 0 0 8px rgba(79,163,247,0.7);
      background: rgba(255,255,255,0.25);
    }

    .inputBox input::placeholder {
      color: rgba(255,255,255,0.7);
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #ccc;
      transition: 0.3s;
    }

    .toggle-password:hover {
      color: #4fa3f7;
    }

    .login button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #4fa3f7, #80d0ff);
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.3s;
      text-transform: uppercase;
      box-shadow: 0 5px 15px rgba(79,163,247,0.5);
    }

    .login button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(79,163,247,0.7);
    }

    .group {
      text-align: center;
      margin-top: 15px;
    }

    .group a {
      font-size: 0.95em;
      color: #80d0ff;
      text-decoration: none;
      font-weight: 500;
    }

    .group a:hover {
      text-decoration: underline;
    }

    /* Error box */
    .error-box {
      background: rgba(255,65,108,0.1);
      color: #ff4b5c;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
      border-left: 4px solid #ff4b5c;
    }
  </style>
</head>
<body>
  <!-- Animated Background Bubbles -->
  <div class="bubbles">
    <span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span>
  </div>

  <!-- Login Card -->
  <div class="login">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="inputBox">
        <input type="text" placeholder="Username" name="username" required>
      </div>

      <div class="inputBox">
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit">Login</button>
    </form>

    <div class="group">
      <p style="font-size: 0.9em; color:#fff;">
        Don't have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
