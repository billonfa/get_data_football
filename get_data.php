<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bill-getdata-football";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
    }
    $id = $_POST['id'];
    // Truy vấn dữ liệu từ bảng bill_data_football
    $sql = "SELECT * FROM bill_data_football WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // Tạo một mảng để lưu trữ dữ liệu
    $data = array();

    // Duyệt qua các bản ghi và lưu trữ chúng trong mảng
    while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
    }

    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($data);

    // Đóng kết nối
    mysqli_close($conn);
?>