// Lấy thẻ div và canvas từ DOM
var div = document.getElementById("myDiv");
var canvas = document.getElementById("canvas");

// Thiết lập kích thước cho canvas
canvas.width = div.offsetWidth;
canvas.height = div.offsetHeight;

// Tạo ảnh từ nội dung của thẻ div
html2canvas(div).then(function (canvas) {
  // Chuyển đổi canvas thành ảnh JPG và lưu nó vào một biến
  var imgData = canvas.toDataURL("image/jpeg");

  // Tạo một thẻ <a> để tải xuống ảnh
  var link = document.createElement("a");
  link.download = "myImage.jpg";
  link.href = imgData;
  link.click();
});