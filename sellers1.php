<?php
$query = "SELECT * FROM sellers";
$result = $conn->query($query);
?>

<h1>Sellers</h1>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Actions</th>
  </tr>
  <?php while ($seller = $result->fetch_assoc()) { ?>
  <tr>
    <td><?php echo $seller['id']; ?></td>
    <td><?php echo $seller['name']; ?></td>
    <td><?php echo $seller['email']; ?></td>
    <td>
      <a href="edit_seller.php?id=<?php echo $seller['id']; ?>">Edit</a>
      <a href="delete_seller.php?id=<?php echo $seller['id']; ?>">Delete</a>
    </td>
  </tr>
  <?php } ?>
</table>
<a href="create_seller.php">Create New Seller</a>
