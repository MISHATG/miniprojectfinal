<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="stylelink.css">
</head>
<body>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Internship Name</th>
          <th class="text-center">Internship URL</th>
          <th class="text-center">Dept</th>
        </tr>
      </thead>
      <?php
        $server = "localhost";
        $user = "root";
        $password = "";
        $db = "swiss_collection";

        $conn = mysqli_connect($server, $user, $password, $db);

        if (!$conn) {
          die("Connection Failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        $count = 1;

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
      ?>
      <tr>
        <td><?= $count ?></td>
        <td><?= $row["product_name"] ?></td>
        <td>
          <form method="post" action="update_data.php">
            <input type="hidden" name="product_name" value="<?= $row["product_name"]; ?>">
            <input type="url" name="product_url" value="<?= $row["product_url"]; ?>" required>
            <button type="submit">Save URL</button>
          </form>
        </td>
        <td>
          <form method="post" action="update_data.php">
            <input type="hidden" name="product_name" value="<?= $row["product_name"]; ?>">
            <input type="text" name="dept" value="<?= $row["dept"]; ?>" required>
            <button type="submit">Save Dept</button>
          </form>
        </td>
      </tr>
      <?php
          $count++;
        }
      }
      ?>
    </table>
  </div>
</body>
</html>
