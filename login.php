<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username']) || empty($_POST['pswd'])) {
        $_SESSION['empty_fields'] = true;
        header("Location: index.php");
        exit();
    }

    $user_name = $_POST['username'];
    $pass_word = md5($_POST['pswd']);

    include "conn.php";

    $sql = "SELECT * FROM users_acc WHERE user_name = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_name, $pass_word);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['logged_in'] = true;
        echo json_encode(['status' => 'success']); // Return JSON data for successful login
        exit();
    } else {
        $_SESSION['login_failed'] = true;
        echo json_encode(['status' => 'failed']); // Return JSON data for failed login
        exit();
    }

} else {
    $_SESSION['login_failed'] = true;
    header("Location: index.php");
    exit();
}
?>
