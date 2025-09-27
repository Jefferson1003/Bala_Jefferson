<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #e1bee7);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background: #7e57c2;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #ede7f6;
        }

        a {
            color: #7e57c2;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        a:hover {
            color: #5e35b1;
            text-decoration: underline;
        }

        .add-btn {
            display: inline-block;
            margin: 20px auto;
            background: #7e57c2;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: 0.3s;
        }

        .add-btn:hover {
            background: #5e35b1;
        }

        /* 🔥 Modern Pagination (pill style) */
        .pagination-wrapper {
            margin-top: auto;
            padding: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 50px; /* pill shape */
            font-size: 15px;
            font-weight: 500;
            color: #333;
            background: #f1f1f1;
            border: none;
            transition: all 0.3s ease;
            text-decoration: none;
            min-width: 40px;
            text-align: center;
        }

        .pagination-wrapper a:hover {
            background: #7e57c2;
            color: #fff;
        }

        .pagination-wrapper .active {
            background: #000;
            color: #fff !important;
            font-weight: bold;
        }

        .pagination-wrapper .prev,
        .pagination-wrapper .next {
            background: #fff;
            border: 1px solid #ccc;
            font-weight: 600;
        }

        .pagination-wrapper .prev:hover,
        .pagination-wrapper .next:hover {
            background: #7e57c2;
            color: #fff;
            border-color: #7e57c2;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            max-width: 800px;
            margin: 0 auto 20px auto;
        }

        .welcome-text {
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }

        .logout-btn {
            background: #e53935;
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #b71c1c;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <span class="welcome-text">
            Welcome: <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User' ?>
        </span>
        <a href="<?= site_url('/logout') ?>" class="logout-btn">Logout</a>
    </div>
    <h2>Students</h2>
    <form method="get" class="search-form" style="text-align:center; margin-bottom:20px;">
        <input type="text" name="q" placeholder="Search..." value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($students) && is_array($students)): ?>
        <?php foreach ($students as $student):?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['first_name'] ?></td>
                <td><?= $student['last_name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td>
                    <a href="<?= site_url('students/update/') . $student['id'] ?>">Update</a> |
                    <a href="<?= site_url('students/delete/') . $student['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" style="text-align:center;">No records found.</td></tr>
        <?php endif; ?>
    </table>

    <a href="<?= site_url('students/create') ?>" class="add-btn">➕ Add New Student</a>

    <?php echo $page ?>
</body>

</html>
