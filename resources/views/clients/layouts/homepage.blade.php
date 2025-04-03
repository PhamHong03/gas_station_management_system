@include('clients.layouts.header')

<body>
  <!-- Map Container -->
  <div id="user-avatar">
    <img src="https://i.pravatar.cc/1" alt="User Avatar">
  </div>

  <div id="popup_avatar">
    <p><strong>Tên người dùng</strong></p>
    <p>Email: user@example.com</p>
    <div class="popup-item" id="login-btn">Đăng nhập</div>
    <div class="popup-item" id="logout-btn">Đăng xuất</div>
</div>

  <div id="map">
    <div id="search-box">
      <input type="text" id="search-input" placeholder="Nhập địa chỉ...">
      <button id="search-btn">🔍</button>
      <i id="nav-icon" class="fa-solid fa-diamond-turn-right"></i>
      </div>

    <div id="navigation-form">
      <button id="nav-close-btn">❌</button>
      
      <input type="text" id="start-location" placeholder="Nhập điểm xuất phát..." >
      <input type="text" id="end-location" placeholder="Nhập điểm đến...">
    </div>
  </div>

  <div id="danhmuc">
      <button class="category-btn">Cửa hàng xăng</button>
      <button class="category-btn">Trạm sạc điện</button>
      <button class="category-btn">Cây ATM</button>
  </div>


  <!-- Panel Thông tin bên trái -->
  <div id="info-panel">
  <button id="close-btn">❌</button>

    <div id="info-content">
      <p>Chọn một địa điểm trên bản đồ để xem chi tiết.</p>
    </div>
  </div>
  
  <div id="info-panel" class="hidden">
    <button id="close-btn">❌</button>
    <div id="info-content">
      <div data-location-id="1">
        <img src="" alt="Tên địa điểm" style="max-width:100%; height:auto; display:block; margin:0 auto;">
        <h3>Tên địa điểm</h3>
        <p><strong>Đánh giá:</strong> ⭐⭐⭐⭐☆ (4.5/5)</p>

        <div id="tab-content">
          <!-- Tab 1: Tổng Quan -->
          <div class="tab-panel active" id="overview">
            <p><strong>📍 Địa chỉ:</strong> Địa chỉ mẫu</p>
            <p><strong>⏰ Giờ hoạt động:</strong> 08:00 - 22:00</p>
            <p><strong>📞 Điện thoại:</strong> 0123 456 789</p>
          </div>
          <hr>

          <!-- Bài Đánh Giá -->
          <div id="reviews">
            <h3>📢 Bài Đánh Giá</h3>
            <div id="review-list">
              <div class="review-item">
                <p><strong>Nguyễn Văn A</strong> - ⭐⭐⭐⭐⭐</p>
                <p>💬 Dịch vụ tốt, nhân viên thân thiện!</p>
              </div>
              <div class="review-item">
                <p><strong>Trần Thị B</strong> - ⭐⭐⭐⭐☆</p>
                <p>💬 Giá cả hợp lý, phục vụ nhanh.</p>
              </div>
            </div>

            <h3>Thêm Đánh Giá</h3>
            <form id="review-form">
              <input type="text" id="review-name" placeholder="Tên bạn" required><br>
              <select id="review-rating">
                <option value="5">⭐⭐⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="2">⭐⭐</option>
                <option value="1">⭐</option>
              </select><br>
              <textarea id="review-comment" placeholder="Nhận xét của bạn" required></textarea><br>
              <button type="submit">Gửi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="popup-container" data-location-id="1">
    <h3 class="popup-title">Tên Địa Điểm</h3>
    <p class="popup-rating">Đánh giá: <span class="rating-stars">⭐⭐⭐⭐</span> (4/5)</p>
    <p class="popup-hours">⏰ Giờ mở cửa: <b>06:00 - 22:00</b></p>
  </div> -->

  
  <!-- Import Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <!-- Import Leaflet Geocoder JS -->
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script> 
  <script>

    var mapOptions = {
      center: [10.026667, 105.783333],
      zoom: 15
    };


    // L.Marker.prototype.options.icon = L.icon({
    //     iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png',
    //     shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png'
    // });


    var map = new L.map('map', mapOptions);
    var layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(layer);
    
    var geocoder = L.Control.Geocoder.nominatim();
    var control = L.Control.geocoder({
      geocoder: geocoder,
      defaultMarkGeocode: false
    }).addTo(map);
    
    control.on("markgeocode", function(e) {
        var center = e.geocode.center; // Lấy tọa độ vị trí tìm kiếm được
        L.marker(center).addTo(map) // Thêm marker vào vị trí vừa tìm thấy
            .bindPopup(e.geocode.name) // Hiển thị tên địa điểm trong popup
            .openPopup();
        map.setView(center, 15); // Di chuyển bản đồ đến vị trí đó
        });


    // Tạo icon mặc định cho cây xăng
<<<<<<< Updated upstream
    var gasStationIcon = L.icon({
        iconUrl: 'resources/gas-station.png', // Đường dẫn đến ảnh
        iconSize: [20, 20], // Kích thước icon (chiều rộng, chiều cao)
        iconAnchor: [20, 40], // Điểm neo của icon (nằm dưới cùng ở giữa)
        popupAnchor: [0, -40] // Điểm neo của popup
    });
    var userIcon = L.icon({
        iconUrl: '/assets/images/location.png', // Đường dẫn đến ảnh
        iconSize: [20, 20], // Kích thước icon (chiều rộng, chiều cao)
        iconAnchor: [20, 40], // Điểm neo của icon (nằm dưới cùng ở giữa)
        popupAnchor: [0, -40] // Điểm neo của popup
    });


/*
    var locations = [
      { 
          id: 1,
          name: "Cửa hàng Xăng dầu Petrolimex Số 05",
          address: "24 Nguyễn Trãi, Thới Bình, Ninh Kiều, Cần Thơ, Việt Nam",
          phone: "02923821675",
          coords: [10.04501, 105.78088],
          image: "https://lh5.googleusercontent.com/p/AF1QipOpl3G1h8M124D8daxNjqPfGCtDrVSpEEMj7Jyi=w408-h544-k-no",
          rating: 4.0,
          openHours: "06:00 - 22:00",
          reviews: [
          { name: "Nguyễn Văn A", rating: 5, comment: "Dịch vụ tốt, nhân viên thân thiện!" },
          { name: "Trần Thị B", rating: 4, comment: "Giá xăng ổn định, đổ nhanh chóng." },
          { name: "Trần Thị B", rating: 4, comment: "Giá xăng ổn định, đổ nhanh chóng." }
            ]
      },
      { 
          id: 2,
          name: "Khu II - Đường 3/2",
          coords: [10.038072, 105.769839],
          image: "https://upload.wikimedia.org/wikipedia/commons/2/2d/CTU_Main.jpg",
          rating: 4.2,
          openHours: "07:00 - 20:00",
          reviews: [
          { name: "Nguyễn Văn A", rating: 5, comment: "Dịch vụ tốt, nhân viên thân thiện!" },
          { name: "Trần Thị B", rating: 4, comment: "Giá xăng ổn định, đổ nhanh chóng." },
          { name: "Trần Thị B", rating: 4, comment: "Giá xăng ổn định, đổ nhanh chóng." }
      ]
      }
    ];
    
    function getStarRating(rating) {
      var fullStar = '⭐';
      var stars = "";
      for (var i = 1; i <= 5; i++) {
          stars += i <= Math.floor(rating) ? fullStar : "☆";
      }
      return stars;
    }

    function showInfoPanel() {
      document.getElementById("info-panel").classList.add("show");
      document.getElementById("map").classList.add("expanded");
    }
    function hideInfoPanel() {
      document.getElementById("info-panel").classList.remove("show");
      document.getElementById("map").classList.remove("expanded");
    }
    
    
    // // Định nghĩa icon cây xăng
    // var gasStationIcon = L.icon({
    //     iconUrl: 'https://cdn-icons-png.flaticon.com/512/6686/6686706.png', 
    //     iconSize: [40, 40], // Kích thước của logo
    //     iconAnchor: [20, 40], // Điểm neo của icon
    //     popupAnchor: [1, -34] // Điểm neo của popup
    // });

    //     // Duyệt qua từng địa điểm để thêm marker với icon cây xăng
    //     locations.forEach(function(location) {
    //         var marker = L.marker(location.coords, { icon: gasStationIcon }).addTo(map);

    //         marker.bindPopup(`<h3>${location.name}</h3><p>📍 ${location.address}</p><p>📞 ${location.phone}</p>`);
    //     });
    // //icon sài được nhưng chưa đúng hình
    // locations.forEach(function(location) {
    //     var marker = L.marker(location.coords).addTo(map);
    //     marker.bindPopup(`<h3>${location.name}</h3><p>📍 ${location.address}</p><p>📞 ${location.phone}</p>`);
    // });


    //icon cay xăng
    var icon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/6686/6686706.png', 
                iconSize: [40, 40], // Kích thước của logo
                iconAnchor: [20, 40], // Vị trí của logo
                popupAnchor: [1, -34] // Vị trí của popup
            });
/*
    locations.forEach(function(location) {
      var marker = L.marker(location.coords).addTo(map);
            
            marker.setIcon(icon);
            marker.addTo(map);

            
      // ❌ Popup KHÔNG chứa hình ảnh
      // var popupContent = `
      //   <div data-location-id="${location.id}">
      //     <h3 style="margin: 5px 0;">${location.name}</h3>
      //     <p style="margin: 5px 0; font-size: 16px;">Đánh giá: ${getStarRating(location.rating)} (${location.rating}/5)</p>
      //     <p style="margin: 5px 0; font-size: 14px;">⏰ Giờ mở cửa: <b>${location.openHours}</b></p>
      //   </div>
      // `;
      //marker.bindPopup(popupContent);
      
      marker.on("mouseover", function() { 
        this.openPopup();
      });
      marker.on("mouseout", function() { 
        this.closePopup();
      });
      



      // ✅ Panel bên trái sẽ HIỂN THỊ hình ảnh
      marker.on("click", function() {
        document.getElementById("info-content").innerHTML = `
            <div data-location-id="${location.id}">
            <img src="${location.image}" alt="${location.name}" style="max-width:100%; height:auto; display:block; margin:0 auto;">
            <h3>${location.name}</h3>
            <p><strong>Đánh giá:</strong> ${getStarRating(location.rating)} (${location.rating}/5)</p>
        
            <div id="tab-content">
                <!-- Tab 1: Tổng Quan -->
                <div class="tab-panel active" id="overview">
                    <p><strong>📍 Địa chỉ:</strong> ${location.address}<span id="place-address"></span></p>
                    <p><strong>⏰ Giờ hoạt động:</strong> ${location.openHours} <span id="place-hours"></span></p>
                    <p><strong>📞 Điện thoại:</strong> ${location.phone}<span id="place-phone"></span></p>
                </div>
                <hr>

                <!-- Bài Đánh Giá -->
                <div id="reviews">
                    <h3>📢 Bài Đánh Giá</h3>
                    <div id="review-list">
                    ${location.reviews.length > 0 
                        ? location.reviews.map(review => `
                            <div class="review-item">
                                <p><strong>${review.name}</strong> - ${getStarRating(review.rating)}</p>
                                <p>💬 ${review.comment}</p>
                                
                            </div>
                        `).join('')
                        : "<p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>"
                        
                    }
                    <h3>Thêm Đánh Giá</h3>
                    <form id="review-form">
                      <input type="text" id="review-name" placeholder="Tên bạn" required><br>
                      <select id="review-rating">
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                      </select><br>
                      <textarea id="review-comment" placeholder="Nhận xét của bạn" required></textarea><br>
                      <button type="submit">Gửi</button>
                    </form>
                    </div>
                </div>
            </div>

          </div>
        `;
        showInfoPanel();
      });
    });

    document.getElementById("close-btn").addEventListener("click", hideInfoPanel);


    // button navigation
    function showNavForm() {
      document.getElementById("navigation-form").classList.add("show");
      document.getElementById("map").classList.add("expanded");

    }

    function hideNavForm() {
      document.getElementById("navigation-form").classList.remove("show");
      document.getElementById("map").classList.remove("expanded");

    }

    // Khi nhấn vào icon navigation, hiển thị form
    document.getElementById("nav-icon").addEventListener("click", showNavForm);

    // Khi nhấn vào nút đóng, ẩn form
    document.getElementById("nav-close-btn").addEventListener("click", hideNavForm);


    //PHẦN ĐĂNG NHẬP, ĐĂNG XUẤT, POPUP AVATAR NGƯỜI DÙNG
    document.addEventListener("DOMContentLoaded", function () {
    const avatar = document.getElementById("user-avatar");
    const popup = document.getElementById("popup_avatar");

    // Toggle hiển thị popup khi nhấn avatar
    avatar.addEventListener("click", function (event) {
        popup.classList.toggle("show");
        event.stopPropagation(); // Ngăn chặn sự kiện lan ra ngoài
    });

    // Ẩn popup khi nhấn bên ngoài
    document.addEventListener("click", function (event) {
        if (!avatar.contains(event.target) && !popup.contains(event.target)) {
            popup.classList.remove("show");
        }
    });

    // Xử lý đăng nhập (có thể thay đổi logic)
    document.getElementById("login-btn").addEventListener("click", function () {
        alert("Chức năng đăng nhập!");
    });

    // Xử lý đăng xuất (có thể thay đổi logic)
    document.getElementById("logout-btn").addEventListener("click", function () {
        alert("Đã đăng xuất!");
    });
});



  </script>
</body>
</html>
