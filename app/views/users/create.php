<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
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
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      overflow: hidden;
    }

    /* Floating circles background */
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
      background: rgba(255, 255, 255, 0.15);
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

    /* Form Card */
    .form-container {
      position: relative;
      width: 380px;
      padding: 40px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 10px 35px rgba(0,0,0,0.5);
      z-index: 1;
      animation: slideUp 0.7s ease-in-out;
    }

    @keyframes slideUp {
      from { transform: translateY(40px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .form-container h1 {
      text-align: center;
      font-size: 2em;
      font-weight: 700;
      color: #fff;
      margin-bottom: 25px;
    }

    .form-group input {
      width: 100%;
      padding: 14px 15px;
      font-size: 1em;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,0.25);
      margin-bottom: 18px;
      background: rgba(255, 255, 255, 0.12);
      color: #fff;
      transition: 0.3s;
    }

    .form-group input::placeholder {
      color: #bbb;
    }

    .form-group input:focus {
      outline: none;
      border-color: #4fa3f7;
      box-shadow: 0 0 8px rgba(79,163,247,0.6);
      background: rgba(255,255,255,0.2);
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #4fa3f7, #80d0ff);
      color: #fff;
      border: none;
      border-radius: 12px;
      font-size: 1.1em;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      text-transform: uppercase;
    }

    .btn-submit:hover {
      opacity: 0.95;
      box-shadow: 0 8px 20px rgba(79,163,247,0.5);
    }

    .link-wrapper {
      text-align: center;
      margin-top: 18px;
    }

    .btn-link {
      display: inline-block;
      padding: 10px 18px;
      background: none;
      color: #80d0ff;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s;
      border: 1px solid #80d0ff;
    }

    .btn-link:hover {
      background: #80d0ff;
      color: #000;
      box-shadow: 0 0 12px #80d0ff;
    }
  </style>
</head>
<body>
  <!-- Background circles -->
  <ul class="circles">
    <li></li><li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li><li></li>
  </ul>

  <div class="form-container">
    <h1>Create User</h1>
    <form id="user-form" action="<?=site_url('users/create/')?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required value="<?= isset($username) ? html_escape($username) : '' ?>">
      </div>
      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required value="<?= isset($email) ? html_escape($email) : '' ?>">
      </div>
      <button type="submit" class="btn-submit">Create User</button>
    </form>
    <div class="link-wrapper">
      <a href="<?=site_url('/users'); ?>" class="btn-link">Return to Home</a>
    </div>
  </div>
</body>
</html>
