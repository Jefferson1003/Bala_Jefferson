<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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
      background: linear-gradient(135deg, #0d0d1a, #1a1a40, #0d7377);
      overflow: hidden;
    }

    /* Floating gradient orbs */
    .circles {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 0;
      overflow: hidden;
    }

    .circles li {
      position: absolute;
      display: block;
      list-style: none;
      width: 30px;
      height: 30px;
      background: linear-gradient(135deg, rgba(0,255,163,0.3), rgba(0,229,255,0.2));
      animation: animate 25s linear infinite;
      bottom: -150px;
      border-radius: 50%;
    }

    .circles li:nth-child(1) { left: 15%; width: 80px; height: 80px; animation-duration: 18s; }
    .circles li:nth-child(2) { left: 60%; width: 20px; height: 20px; animation-duration: 12s; }
    .circles li:nth-child(3) { left: 70%; width: 100px; height: 100px; animation-duration: 22s; }
    .circles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-duration: 16s; }
    .circles li:nth-child(5) { left: 80%; width: 150px; height: 150px; animation-duration: 30s; }

    @keyframes animate {
      0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 30%; }
      100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
    }

    /* Register Card */
    .register {
      position: relative;
      width: 420px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      backdrop-filter: blur(25px);
      box-shadow: 0 0 25px rgba(0, 229, 255, 0.3),
                  0 0 40px rgba(0, 255, 163, 0.25);
      z-index: 1;
    }

    .register h2 {
      text-align: center;
      font-size: 2.2em;
      font-weight: 700;
      margin-bottom: 25px;
      color: #00ffa3;
      text-shadow: 0 0 15px #00e5ff, 0 0 30px #00ffa3;
      letter-spacing: 1px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 22px;
    }

    .inputBox input,
    .inputBox select {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #fff;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.15);
      outline: none;
      border-radius: 12px;
      transition: 0.3s;
    }

    .inputBox input:focus,
    .inputBox select:focus {
      border-color: #00ffa3;
      box-shadow: 0 0 12px #00e5ff;
    }

    .inputBox input::placeholder {
      color: #bbb;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #00ffa3;
      transition: 0.3s;
    }

    .toggle-password:hover {
      color: #00e5ff;
    }

    .register button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      color: #0f0f1a;
      font-size: 1.15em;
      font-weight: 600;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.3s;
      text-transform: uppercase;
      box-shadow: 0 0 15px rgba(0,255,163,0.4);
    }

    .register button:hover {
      opacity: 0.9;
      transform: scale(1.03);
      box-shadow: 0 0 20px #00e5ff, 0 0 25px #00ffa3;
    }

    .group {
      text-align: center;
      margin-top: 20px;
    }

    .group a {
      font-size: 0.95em;
      color: #00e5ff;
      text-decoration: none;
      transition: 0.3s;
    }

    .group a:hover {
      text-decoration: underline;
      color: #00ffa3;
    }
  </style>
</head>
<body>
  <!-- Background floating orbs -->
  <ul class="circles">
    <li></li><li></li><li></li><li></li><li></li>
  </ul>

  <!-- Register Card -->
  <div class="register">
    <h2>Register</h2>
    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="inputBox">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="inputBox">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="inputBox">
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="group">
      <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
