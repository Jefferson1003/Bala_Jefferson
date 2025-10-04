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

    /* HEADER */
    .dashboard-header {
      background: linear-gradient(90deg, #4fa3f7, #80d0ff);
      color: #fff;
      padding: 18px 25px;
      border-radius: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      margin-bottom: 30px;
    }

    .dashboard-header h2 {
      font-weight: 700;
      margin: 0;
    }

    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(90deg, #ff416c, #ff4b2b);
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
      box-shadow: 0 4px 12px rgba(255,65,108,0.4);
    }
    .logout-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(255,65,108,0.6);
    }

    /* STATUS BAR */
    .user-status {
      padding: 12px 18px;
      border-radius: 12px;
      font-size: 14px;
      background: #fff;
      border-left: 5px solid #4fa3f7;
      color: #333;
      margin-bottom: 20px;
      box-shadow: 0 5px 12px rgba(0,0,0,0.05);
    }
    .user-status.error {
      border-left: 5px solid #ff416c;
      color: #ff416c;
      background: #fff;
    }

    /* TABLE CARD */
    .table-card {
      background: #fff;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    table {
      border-radius: 12px;
      overflow: hidden;
    }

    th {
      background: #4fa3f7;
      color: #fff;
      font-size: 14px;
      text-transform: uppercase;
      text-align: center;
      padding: 12px;
    }

    td {
      background: #fdfdfd;
      border-bottom: 1px solid #eee;
      color: #333;
      text-align: center;
      vertical-align: middle;
      padding: 12px;
      transition: 0.2s;
    }

    tr:hover td {
      background: #f1f7ff;
    }

    /* BUTTONS */
    a.btn-action {
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      margin: 0 2px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
      display: inline-block;
    }

    a.btn-update {
      background: linear-gradient(90deg, #4fa3f7, #80d0ff);
      box-shadow: 0 3px 8px rgba(79,163,247,0.4);
    }
    a.btn-update:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 14px rgba(79,163,247,0.6);
    }

    a.btn-delete {
      background: linear-gradient(90deg, #ff416c, #ff4b2b);
      box-shadow: 0 3px 8px rgba(255,65,108,0.4);
    }
    a.btn-delete:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 14px rgba(255,65,108,0.6);
    }

    .btn-create {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #4fa3f7, #80d0ff);
      color: #fff;
      font-size: 1.1em;
      border-radius: 12px;
      font-weight: 600;
      transition: 0.3s;
      margin-top: 25px;
      box-shadow: 0 5px 15px rgba(79,163,247,0.5);
    }
    .btn-create:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(79,163,247,0.7);
    }

    /* PAGINATION */
    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    /* SEARCH */
    .search-form {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }

    .search-form input {
      flex: 1;
      border-radius: 8px;
      border: 1px solid #ddd;
      background: #f9f9f9;
      padding: 10px 15px;
      color: #333;
      transition: 0.2s;
    }
    .search-form input:focus {
      border: 1px solid #4fa3f7;
      box-shadow: 0 0 8px rgba(79,163,247,0.4);
      background: #fff;
    }

    .search-form button {
      background: #4fa3f7;
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 16px;
      transition: 0.2s;
    }
    .search-form button:hover {
      background: #3a8de0;
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
      <form action="<?=site_url('users');?>" method="get" class="search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input name="q" type="text" class="form-control" placeholder="Search" value="<?=html_escape($q);?>">
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
