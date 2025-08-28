<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $total = $_POST['perload_total_input'];
    $load = $_POST['per_load'];
    $equipment_id = $_POST['perload_equipment_id'];
    $user_id = $_POST['perload_user_id'];
    $user_email = $_POST['perload_user_email'];
    $load_summary = $_POST['perload_total'];
    $equipment_name = $_POST['perload_equipment_name_input'];
    include "conn.php";



    $stmt_select = $conn->prepare("SELECT equipment_qty FROM equipment_tbl WHERE id = ?");
    $stmt_select->bind_param("i", $equipment_id);
    $stmt_select->execute();
    $stmt_select->bind_result($equipment_qty);
    $stmt_select->fetch();
    $stmt_select->close();

    if ($equipment_qty > 0) {
        
        $stmt = $conn->prepare("INSERT INTO rental (equipment_id, user_id, user_email, summary, total, equipment_load,equipment_name) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissiis", $equipment_id, $user_id, $user_email, $load_summary, $total, $load, $equipment_name);

        
     
        if ($stmt->execute()) {
            
            $new_quantity = $equipment_qty - 1; 

            $stmt_update = $conn->prepare("UPDATE equipment_tbl SET equipment_qty = ? WHERE id = ?");
            $stmt_update->bind_param("ii", $new_quantity, $equipment_id);
            $stmt_update->execute();
            $stmt_update->close();

            header("Location: index.php");
            exit();
        } else {

            header('location: index.php');
        }

        $stmt->close();
    } else {
        
        echo "<script>const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: 'error',
            title: 'Sorry! The equipment is fully loaded'
        });</script>";
    }

    $conn->close();
} else {
    header("Location: index.php"); 
    exit();
}
?>
