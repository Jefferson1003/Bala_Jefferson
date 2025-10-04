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
      background: linear-gradient(135deg, #89f7fe, #66a6ff);
    }

    /* Background circles soft */
    .circles {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .circles li {
      position: absolute;
      display: block;
      list-style: none;
      width: 20px;
      height: 20px;
      background: rgba(255, 255, 255, 0.25);
      animation: float 25s linear infinite;
      bottom: -150px;
      border-radius: 50%;
    }

    .circles li:nth-child(1) { left: 25%; width: 60px; height: 60px; animation-duration: 15s; }
    .circles li:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-duration: 10s; }
    .circles li:nth-child(3) { left: 70%; width: 25px; height: 25px; animation-duration: 20s; }
    .circles li:nth-child(4) { left: 40%; width: 50px; height: 50px; animation-duration: 18s; }
    .circles li:nth-child(5) { left: 65%; width: 30px; height: 30px; animation-duration: 12s; }
    .circles li:nth-child(6) { left: 75%; width: 90px; height: 90px; animation-duration: 25s; }
    .circles li:nth-child(7) { left: 35%; width: 120px; height: 120px; animation-duration: 35s; }
    .circles li:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-duration: 40s; }
    .circles li:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-duration: 11s; }
    .circles li:nth-child(10){ left: 85%; width: 140px; height: 140px; animation-duration: 30s; }

    @keyframes float {
      0% { transform: translateY(0) rotate(0deg); opacity: 1; }
      100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; }
    }

    /* Login Card */
    .login {
      position: relative;
      width: 380px;
      padding: 45px 35px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 35px rgba(0,0,0,0.15);
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
      font-weight: 600;
      margin-bottom: 25px;
      color: #333;
    }

    .inputBox {
      position: relative;
      margin-bottom: 25px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 50px 14px 15px;
      font-size: 1em;
      color: #333;
      background: #f9f9f9;
      border: 1px solid #ddd;
      outline: none;
      border-radius: 12px;
      transition: 0.3s;
    }

    .inputBox input:focus {
      border: 1px solid #66a6ff;
      box-shadow: 0 0 8px rgba(102,166,255,0.6);
      background: #fff;
    }

    .inputBox input::placeholder {
      color: #888;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #888;
      transition: 0.3s;
    }

    .toggle-password:hover {
      color: #66a6ff;
    }

    .login button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(135deg, #66a6ff, #89f7fe);
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.3s;
      text-transform: uppercase;
    }

    .login button:hover {
      opacity: 0.9;
      box-shadow: 0 8px 20px rgba(102,166,255,0.5);
    }

    .group {
      text-align: center;
      margin-top: 15px;
    }

    .group a {
      font-size: 0.95em;
      color: #66a6ff;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Background circles -->
  <ul class="circles">
    <li></li><li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li><li></li>
  </ul>

  <!-- Login Card -->
  <div class="login">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div style="background: rgba(255,0,0,0.08); color: #cc0000; padding: 10px; border-radius: 8px; margin-bottom: 15px; text-align: center; font-size: 0.9em;">
        <?= $error ?>
      </div>
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
      <p style="font-size: 0.9em;">
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
