<?php

include "conn.php";

$sql = "SELECT * FROM sand_tbl order by id desc";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
?>


							<tr>
								<th scope="row"><img src="functions/sand_images/<?php echo $row['image']; ?>" height="60" width="80" style="border-radius:10%;"></th>
								<th scope="row"><?php echo $row['sand']; ?></th>
								<td>₱<?php echo $row['rate_per_bucket']; ?></td>
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