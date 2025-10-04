<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
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
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      overflow: hidden;
      padding: 20px;
    }

    /* glowing floating lights */
    body::before,
    body::after {
      content: '';
      position: absolute;
      border-radius: 50%;
      filter: blur(180px);
      animation: float 12s infinite alternate ease-in-out;
      z-index: 0;
    }

    body::before {
      width: 400px;
      height: 400px;
      background: rgba(0, 242, 254, 0.6);
      top: -120px;
      left: -100px;
    }

    body::after {
      width: 500px;
      height: 500px;
      background: rgba(79, 172, 254, 0.5);
      bottom: -150px;
      right: -150px;
    }

    @keyframes float {
      from { transform: translateY(0); }
      to { transform: translateY(60px); }
    }

    .form-card {
      position: relative;
      width: 100%;
      max-width: 450px;
      padding: 35px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 25px rgba(0, 242, 254, 0.3),
                  0 0 45px rgba(79, 172, 254, 0.25);
      z-index: 1;
    }

    .form-card h1 {
      text-align: center;
      font-size: 2em;
      font-weight: 700;
      color: #00f2fe;
      margin-bottom: 25px;
      text-shadow: 0 0 10px #00f2fe;
    }

    .form-group {
      margin-bottom: 18px;
      position: relative;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      font-size: 1em;
      border-radius: 8px;
      border: 2px solid transparent;
      background: rgba(255, 255, 255, 0.12);
      color: #fff;
      transition: 0.3s;
    }

    .form-group input::placeholder {
      color: #ccc;
    }

    .form-group input:focus,
    .form-group select:focus {
      outline: none;
      border-color: #00f2fe;
      box-shadow: 0 0 8px #00f2fe, 0 0 15px #4facfe;
      background: rgba(255,255,255,0.18);
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #00f2fe;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      background: linear-gradient(90deg, #00f2fe, #4facfe);
      color: #000;
      border: none;
      border-radius: 10px;
      font-size: 1.1em;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 0 15px rgba(0,242,254,0.5);
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 20px rgba(0,242,254,0.8),
                  0 0 40px rgba(79,172,254,0.6);
    }

    .btn-return {
      display: block;
      text-align: center;
      margin-top: 20px;
      padding: 12px;
      background: none;
      color: #00f2fe;
      border: 1px solid #00f2fe;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-return:hover {
      background: #00f2fe;
      color: #000;
      box-shadow: 0 0 12px #00f2fe;
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?=html_escape($user['username']);?>" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" value="<?=html_escape($user['email']);?>" placeholder="Email" required>
      </div>
      
      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="form-group">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>
    <a href="<?=site_url('/users');?>" class="btn-return">Return to Home</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    if(togglePassword){
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
