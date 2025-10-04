<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #dbefff, #ffffff);
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 20px;
      color: #333;
      position: relative;
      overflow-x: hidden;
    }

    /* floating bubbles */
    body::before, body::after {
      content: "";
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,0.6);
      backdrop-filter: blur(15px);
      animation: float 12s infinite ease-in-out;
    }
    body::before {
      width: 280px; height: 280px;
      top: 8%; left: 5%;
    }
    body::after {
      width: 200px; height: 200px;
      bottom: 15%; right: 10%;
    }
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-25px); }
    }

    .dashboard {
      width: 100%;
      max-width: 1100px;
      background: rgba(255, 255, 255, 0.55);
      border-radius: 20px;
      backdrop-filter: blur(18px) saturate(180%);
      padding: 30px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    }

    .dashboard h1 {
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 15px;
      color: #222;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .welcome {
      background: rgba(255,255,255,0.5);
      padding: 10px 20px;
      border-radius: 12px;
      font-weight: 600;
      color: #333;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .logout {
      background: linear-gradient(135deg, #ff416c, #ff4b2b);
      border: none;
      padding: 10px 20px;
      border-radius: 12px;
      color: #fff;
      cursor: pointer;
      font-weight: 600;
      box-shadow: 0 4px 15px rgba(255,65,108,0.3);
      transition: 0.3s;
    }
    .logout:hover {
      transform: scale(1.05);
    }

    .search-bar {
      display: flex;
      margin-bottom: 20px;
    }
    .search-bar input {
      flex: 1;
      padding: 12px;
      border: none;
      border-radius: 12px 0 0 12px;
      outline: none;
      background: rgba(255,255,255,0.6);
      color: #333;
      box-shadow: inset 0 2px 6px rgba(0,0,0,0.05);
    }
    .search-bar input::placeholder {
      color: #666;
    }
    .search-bar button {
      padding: 12px 20px;
      border: none;
      border-radius: 0 12px 12px 0;
      background: #4fa3f7;
      color: #fff;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }
    .search-bar button:hover {
      background: #1f7be5;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: rgba(255,255,255,0.55);
      border-radius: 14px;
      overflow: hidden;
      backdrop-filter: blur(12px);
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    th, td {
      padding: 14px;
      text-align: left;
      border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    th {
      background: rgba(255,255,255,0.7);
      font-weight: 600;
      color: #222;
    }
    td {
      color: #444;
    }

    .actions button {
      padding: 8px 14px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: 0.3s;
      margin-right: 8px;
    }
    .update {
      background: #4fa3f7;
      color: #fff;
    }
    .update:hover {
      background: #1f7be5;
    }
    .delete {
      background: #ff4b2b;
      color: #fff;
    }
    .delete:hover {
      background: #e63e1a;
    }

    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 15px;
    }
    .pagination button {
      background: rgba(255,255,255,0.6);
      border: none;
      padding: 8px 12px;
      margin: 0 3px;
      border-radius: 8px;
      cursor: pointer;
      color: #333;
      transition: 0.3s;
    }
    .pagination button:hover {
      background: #4fa3f7;
      color: #fff;
    }
    .pagination .active {
      background: #4fa3f7;
      color: #fff;
      font-weight: 600;
    }

    .create-btn {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 20px;
      background: #4fa3f7;
      color: #fff;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      box-shadow: 0 4px 15px rgba(79,163,247,0.3);
      transition: 0.3s;
    }
    .create-btn:hover {
      background: #1f7be5;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <div class="top-bar">
      <h1>Admin Dashboard</h1>
      <button class="logout">Logout</button>
    </div>

    <div class="welcome">Welcome: kwin</div>

    <div class="search-bar">
      <input type="text" placeholder="Search">
      <button>Search</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>PASSWORD</th>
          <th>ROLE</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td><td>bullet</td><td>jefferson@gmail.com</td><td>*******</td><td>user</td>
          <td class="actions"><button class="update">Update</button><button class="delete">Delete</button></td>
        </tr>
        <tr>
          <td>2</td><td>bulletz</td><td>jefferson@gmail.com</td><td>*******</td><td>admin</td>
          <td class="actions"><button class="update">Update</button><button class="delete">Delete</button></td>
        </tr>
        <tr>
          <td>3</td><td>L4nsxczxc</td><td>lanslorence@gmail.com</td><td>*******</td><td>users</td>
          <td class="actions"><button class="update">Update</button><button class="delete">Delete</button></td>
        </tr>
        <tr>
          <td>4</td><td>kwin</td><td>kwin08@gmail.com</td><td>*******</td><td>admin</td>
          <td class="actions"><button class="update">Update</button><button class="delete">Delete</button></td>
        </tr>
      </tbody>
    </table>

    <div class="pagination">
      <button>&laquo; First</button>
      <button>&larr; Prev</button>
      <button class="active">1</button>
      <button>Next &rarr;</button>
      <button>Last &raquo;</button>
    </div>

    <a href="#" class="create-btn">+ Create New User</a>
  </div>
</body>
</html>
