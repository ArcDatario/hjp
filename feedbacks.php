<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <!-- Include Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-4">
        <h2 class="text-center">User Feedback</h2>
        <div class="table-responsive">
            <table class="table table-striped" id="feedback_table">
                <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Equipment</th>
                        <th scope="col">Ratings</th>
                        <th scope="col">Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "conn.php";

                    $sql = "SELECT users_acc.user_name, feedbacks_tbl.comments, equipment_tbl.equipment, ratings
                            FROM feedbacks_tbl 
                            JOIN users_acc ON feedbacks_tbl.user_id = users_acc.id
                            JOIN equipment_tbl ON feedbacks_tbl.equipment_id = equipment_tbl.id";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['equipment']; ?></td>
                        <td><?php echo $row['ratings']; ?> Star</td>
                        <td><?php echo $row['comments']; ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="4" class="text-center">No data found</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
