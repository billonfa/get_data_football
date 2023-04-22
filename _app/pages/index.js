// Alert Modal Type
function getData(id) {
  console.log(id);
  $.ajax({
    url: 'get_data.php', // Đường dẫn tới file xử lý yêu cầu
    type: 'POST',
    data: {id: id}, // Truyền id của thẻ div qua biến "id"
    dataType: 'json',
    success: function(data) {  
      const photo = data[0]['photo']
      const heading = data[0]['heading']
      const content = data[0]['content']
      const gt188 = "Bet bóng cùng chuyên gia tại: mg188.zone";
      console.log(data[0]['photo']); // In dữ liệu trả về trong console
      // Bạn có thể sử dụng dữ liệu này để hiển thị lên trang web
      var newDiv = document.createElement("div");

      // // Tạo một thẻ div mới
      var newDiv = document.createElement("div");
    
      
      // Hiển thị Swal với nội dung HTML chứa thẻ div
      swal.fire({
        
        showCancelButton: false,
        showConfirmButton: false,
        html:
          `<div class="parent">
          <div class="image-container">
            <div class="image-wrapper">
              <img class="big_img" src="photo/${photo}"alt="Image">
              <span class ="logo"><img class="logo_mg188" src="photo/Background-Logo-Mg188.png"/></span>
            </div>
          </div>
          <div class="title-container">
            <h2>${heading}</h2>
          </div>
          <div class="content-container">
            <p>${content}</p>
          </div>
          <div class="span-container">
            <i>${gt188}</i>
          </div>
        </div>`,
        showCloseButton: true,
        confirmButtonText: "Xác nhận",
      });
   
    },
    error: function() {
      console.log('Đã xảy ra lỗi'); // In thông báo lỗi trong console
    }
  }); 
 
}