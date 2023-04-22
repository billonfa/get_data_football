<?php
include_once 'connect.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bill-getdata-football";
$conn = new mysqli($servername, $username, $password, $dbname);
// Lấy dữ liệu từ bảng trong cơ sở dữ liệu
$sql = "SELECT * FROM bill_data_football";
$result = $conn->query($sql);
$checked = true;
$i = 0;
// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <link rel="icon" href="favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>J2TEAM Daily News</title>
    <link rel="stylesheet" href="_app/assets/pages/__layout.svelte-3dc70e1e.css">
    <link rel="stylesheet" href="_app/assets/pages/_entry_.svelte-35a82c8b.css">
    <link rel="modulepreload" href="_app/start-a99d8688.js">
    <link rel="modulepreload" href="_app/chunks/vendor-0b50e6cd.js">
    <link rel="modulepreload" href="_app/pages/__layout.svelte-9a6fd42e.js">
    <link rel="modulepreload" href="_app/pages/_entry_.svelte-9993ef87.js">
    <script type="module">
        import {
            start
        } from "/_app/start-a99d8688.js";
        start({
            target: document.body,
            paths: {
                "base": "",
                "assets": ""
            },
            session: {},
            route: true,
            spa: false,
            trailing_slash: "never",
            hydrate: {
                status: 200,
                error: null,
                nodes: [
                    import("_app/pages/__layout.svelte-9a6fd42e.js"),
                    import("_app/pages/_entry_.svelte-9993ef87.js")
                ],
                url: new URL("the-thao.html"),
                params: {
                    entry: "the-thao"
                }
            }
        });
    </script>
    <link rel="stylesheet" type="text/css" href="_app/assets/pages/style.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <div id="svelte">
        <main class="svelte-1gjgu31">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="the-thao.html">Thể thao</a></li>
                </ul>
            </nav>

            <?php while ($row = $result->fetch_assoc()) { 
                // echo 'photo/'.$row['photo'];
                $date_string = $row['created_at'];
                $date = date_create($date_string);
                $newdate = date_format($date, 'd/m/Y');
                $style = $checked ? 'white' : 'dark';
                $checked = !($checked);
            ?>
                <div onclick="getData(<?php echo $row['id'] ?>)" href="#" class="popup-link card svelte-1e96qu2" id="popup<?php echo $row['id']; ?>">
                    <div class="card-content notification is-<?php echo $style ?>">
                        <div class="content">
                            <p class="subtitle">
                                <?php echo $row['heading'] ?>
                            </p>
                            <time><?php echo $newdate ?></time>
                        </div>
                    </div>
                </div>
            <?php 
                $i++;
                } 
            ?>
        </main>
    </div>

    <footer class="svelte-1gjgu31">Daily news via <a href="https://vnexpress.net/" target="_blank">VnExpress</a>
        <br>
        © 2023 Nomi · <a href="https://github.com/nomi-san/j2team-daily-news">Source code</a>
    </footer>
</body>
<script src="_app/pages/index.js"></script>
<script src="_app/pages/swal.js"></script>
</html>