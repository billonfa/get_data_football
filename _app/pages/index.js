// Alert Modal Type
function getData(id) {
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
      
      // Hiển thị Swal với nội dung HTML chứa thẻ div
      swal.fire({
        customContainerClass: "my-dialog",    
        showCancelButton: false,
        showConfirmButton: false,
        html:
          `
          <div id="convert${id}">
            <div class="parent">
              <div class="image-container">
                <div class="image-wrapper">
                  <img class="big_img" src="photo/images.png" alt="Image">
                  <span class ="logo"><img class="logo_mg188" src="photo/logo.png"/></span>
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
            </div>
            <button id="screenshot${id}">Convert to JPG</button>
          </div> `,
      });

        
      // Lấy đối tượng button có id="screenshot{id}"
      var screenshotButton = document.getElementById("screenshot" + id);

      // Thêm sự kiện click vào button
      screenshotButton.addEventListener("click", function() {
        const logo_mg188 = document.querySelector('.logo_mg188');
        logo_mg188.style.top = '160%'
        const title_container = document.querySelector(".title-container");
        title_container.style.marginTop = '250px';
        const span_container = document.querySelector(".span-container");
        span_container.style.bottom = '-250px';
        const buttonToRemove = document.getElementById("screenshot"+id);
        buttonToRemove.remove()
          window.scrollTo(0,0);
          html2canvas(document.querySelector(".swal2-show")).then(canvas => {
            console.log(canvas.toDataURL("image/jpeg", 0.9));
            let a = document.createElement('a');
            a.href = canvas.toDataURL('image/jpeg', 0.9);
            a.download = heading + '.jpg';
            a.click();
          });
        // Tạo một phần tử button mới
        title_container.style.marginTop = '45px';
        span_container.style.bottom = '0';
        logo_mg188.style.top = '132%'
        const newButton = document.createElement("button");
        newButton.textContent = "Convert to JPG";
        newButton.id = "new-button";
         // Thêm phần tử button mới vào vị trí cần thiết
          const parentDiv = document.getElementById("convert"+id);
          parentDiv.appendChild(newButton);
      });

      

    },
    error: function() {
      console.log('Đã xảy ra lỗi'); // In thông báo lỗi trong console
    }
  }); 
 
}