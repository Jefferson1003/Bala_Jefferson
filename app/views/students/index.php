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
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
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
            margin-top: 20px;
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
    </style>
</head>

<body>
    <h2>Students</h2>
     <form method="get" class="search-form">
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
        <?php foreach ($data as $student): ?>
            <tr>

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
    <!-- Pagination -->
        <div class="pagination-wrapper">
            <?= $page ?>
        </div>
    <a href="<?= site_url('students/create') ?>" class="add-btn">➕ Add New Student</a>
</body>

</html>
