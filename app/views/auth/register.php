<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8fafc; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .card { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.10); width: 350px; }
        h2 { text-align: center; margin-bottom: 20px; }
        label { display: block; margin-bottom: 6px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="password"] { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px; }
        input[type="submit"] { width: 100%; background: #3B82F6; color: white; border: none; padding: 12px; border-radius: 8px; cursor: pointer; font-size: 16px; }
        input[type="submit"]:hover { background: #2563eb; }
        .error { color: #e53935; margin-bottom: 10px; text-align: center; }
        .link { text-align: center; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Register</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('/register') ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <input type="submit" value="Register">
        </form>
        <div class="link">
            <a href="<?= site_url('/login') ?>">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>
