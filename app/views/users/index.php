<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    * {
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #80d0ff, #4fa3f7);
      min-height: 100vh;
      padding: 30px;
    }

    .dashboard-container {
      max-width: 1200px;
      margin: auto;
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .dashboard-header h2 {
      font-weight: 700;
      color: #333;
    }

    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(90deg, #ff416c, #ff4b2b);
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
    }
    .logout-btn:hover {
      opacity: 0.9;
    }

    .user-status {
      padding: 12px 18px;
      border-radius: 10px;
      font-size: 14px;
      background: rgba(79, 163, 247, 0.1);
      border: 1px solid rgba(79, 163, 247, 0.4);
      color: #333;
      margin-bottom: 20px;
    }
    .user-status.error {
      background: rgba(255, 65, 108, 0.1);
      border: 1px solid rgba(255, 65, 108, 0.4);
      color: #ff416c;
    }

    .table-card {
      background: #fff;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    th {
      background: #4fa3f7;
      color: #fff;
      font-size: 14px;
      text-transform: uppercase;
      text-align: center;
    }

    td {
      background: #f9f9f9;
      border-bottom: 1px solid #eee;
      color: #333;
      text-align: center;
    }

    a.btn-action {
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      margin: 0 2px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
    }

    a.btn-update {
      background: linear-gradient(90deg, #4fa3f7, #80d0ff);
    }
    a.btn-update:hover {
      opacity: 0.9;
    }

    a.btn-delete {
      background: linear-gradient(90deg, #ff416c, #ff4b2b);
    }
    a.btn-delete:hover {
      opacity: 0.9;
    }

    .btn-create {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #4fa3f7, #80d0ff);
      color: #fff;
      font-size: 1.1em;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      margin-top: 20px;
    }
    .btn-create:hover {
      opacity: 0.9;
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .search-form input {
      border-radius: 8px;
      border: 1px solid #ccc;
      background: #fff;
      color: #333;
    }
    .search-form input:focus {
      outline: none;
      border: 1px solid #4fa3f7;
      box-shadow: 0 0 10px rgba(79, 163, 247, 0.4);
      background: #fff;
    }

    .search-form button {
      background: #4fa3f7;
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 16px;
    }
    .search-form button:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    
    <div class="dashboard-header">
      <h2>
        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </h2>
      <a href="<?=site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
    </div>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status mb-3">
        <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php else: ?>
      <div class="user-status error mb-3">
        Logged in user not found
      </div>
    <?php endif; ?>

    <!-- Search + Table -->
    <div class="table-card">
      <form action="<?=site_url('users');?>" method="get" class="d-flex mb-3 search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input name="q" type="text" class="form-control me-2" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit">Search</button>
      </form>

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Password</th>
              <th>Role</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>
          <?php foreach ($user as $user): ?>
          <tr>
            <td><?=html_escape($user['id']); ?></td>
            <td><?=html_escape($user['username']); ?></td>
            <td><?=html_escape($user['email']); ?></td>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td>*******</td>
              <td><?= html_escape($user['role']); ?></td>
            <?php endif; ?>
            <td>
              <a href="<?=site_url('/users/update/'.$user['id']);?>" class="btn-action btn-update">Update</a>
              <a href="<?=site_url('/users/delete/'.$user['id']);?>" class="btn-action btn-delete">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>
    </div>

    <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
  </div>
</body>
</html>
