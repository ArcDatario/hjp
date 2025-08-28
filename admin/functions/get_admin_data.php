<?php
include "conn.php";

$sql = "SELECT * FROM admins_acc order by id desc";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
?>

							<tr>
								<th scope="row"><img src="functions/admin_images/<?php echo $row['image']; ?>" height="60" width="80" style="border-radius:10%;"></th>								
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['role']; ?></td>
								                
                                <td>
                                        <button class="btn edit-btn" id="edit_btn"  data-id="<?php echo $row['id']; ?>" style="background-color:#081A51 !important; color:white !important;">
                                          <i class='bx bxs-edit'></i>
                                        </button>

                                    <button class="btn" id="delete_btn" data-id="<?php echo $row['id']; ?>" style="background-color:#F22F31 !important; color:white !important;"><i class='bx bx-trash'></i></button>
                                </td>
							</tr>
                              <?php
    }
} else {
?>
        <tr>
            <td colspan="4">No data found</td>
        </tr>
<?php
}

?>  