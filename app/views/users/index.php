<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login / Register</title>
  <style>
    /* Background sky blue gradient */
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #a1c4fd, #c2e9fb); /* Sky blue gradient */
      overflow: hidden;
    }

    /* Floating circles effect */
    .bubble {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(5px);
      animation: float 10s infinite ease-in-out;
    }

    .bubble:nth-child(1) {
      width: 120px; height: 120px;
      top: 10%; left: 20%;
      animation-duration: 15s;
    }
    .bubble:nth-child(2) {
      width: 80px; height: 80px;
      bottom: 15%; right: 25%;
      animation-duration: 18s;
    }
    .bubble:nth-child(3) {
      width: 100px; height: 100px;
      top: 60%; left: 70%;
      animation-duration: 20s;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-30px); }
    }

    /* Glass card container */
    .container {
      position: relative;
      z-index: 2;
      width: 360px;
      padding: 40px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 30px rgba(0,0,0,0.2);
      text-align: center;
    }

    .container h2 {
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: 600;
      color: #1a3c65;
    }

    .input-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .input-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      color: #1a3c65;
      font-weight: 500;
    }

    .input-group input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 12px;
      outline: none;
      font-size: 14px;
      background: rgba(255,255,255,0.6);
      color: #1a3c65;
    }

    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      color: white;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 20px rgba(79,172,254,0.5);
    }

    .switch-link {
      margin-top: 15px;
      font-size: 14px;
      color: #1a3c65;
    }

    .switch-link a {
      color: #0056b3;
      font-weight: 600;
      text-decoration: none;
    }
    .switch-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Floating bubbles -->
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>

  <!-- Login/Register Form -->
  <div class="container">
    <h2>Login</h2>
    <form>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter your email">
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password">
      </div>
      <button type="submit" class="btn">Login</button>
    </form>
    <p class="switch-link">Don’t have an account? <a href="#">Register</a></p>
  </div>
</body>
</html>
