<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #e1bee7);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            width: 320px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #7e57c2;
            box-shadow: 0 0 5px rgba(126, 87, 194, 0.5);
        }

        input[type="submit"] {
            width: 100%;
            background: #7e57c2;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #5e35b1;
        }
    </style>
</head>

<body>
    <form action="<?= site_url('/students/create'); ?>" method="post">
        <h2>Add a new student</h2>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <input type="submit" value="Add Student">
    </form>
</body>

</html>
