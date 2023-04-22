<?php
function get_data_football () {
    include_once 'connect.php';

    $html = file_get_html('https://bongda24h.vn/');
    $newfeed = $html->find('.content-left');
    $images = $html->find('.content-left .section-news img');
    $headings = $html->find('.content-left .section-news .article-title ');
    $contents = $html->find('.content-left .section-news .article-summary');
    $created_at = date('Y-m-d H:i:s');
    foreach ($images as $keyimage => $image) {
        // URL của hình ảnh
        $img_url = $image->getAttribute('data-src');
        $img_url = str_replace("https://static.bongda24h.vn/medias/thumnail", "https://image.bongda24h.vn/medias/original", $img_url);
        // Thư mục lưu trữ hình ảnh
        $target_dir = "photo/";
        // Tên file mới cho hình ảnh
        $image_name = basename($img_url);
        // Đường dẫn và tên file mới cho hình ảnh
        $target_file = $target_dir . $image_name;
        // Tải hình ảnh từ URL về thư mục
        if (file_put_contents($target_file, file_get_contents($img_url))) {
            echo "Hình ảnh đã được tải về thành công và lưu vào thư mục " . $target_dir;
        } else {
            echo "Lỗi khi tải hình ảnh.";
        }
        $head = $headings[$keyimage]->plaintext;
        $cont = $contents[$keyimage]->plaintext;
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Kiểm tra kết nối
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        // Chuẩn bị câu lệnh SQL để thêm dữ liệu vào bảng
        $sql = "INSERT INTO bill_data_football (photo, heading, content, created_at)
        VALUES ('$image_name', '$head', '$cont', '$created_at')";
        // Thực thi câu lệnh SQL
        if (mysqli_query($conn, $sql)) {
            echo "Thêm dữ liệu thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        // Đóng kết nối
        mysqli_close($conn);
    }
}
get_data_football();
?>