@include('clients.layouts.header')

<body>
  <!-- Map Container -->
  <div id="user-avatar">
    <img src="https://i.pravatar.cc/1" alt="User Avatar">
  </div>
  <!-- người dùng -->
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
        <!-- Tab 1: Tổng Quan -->
          <div class="tab-panel active" id="overview">
                <div id="overview-image">
                    <img src="gas_station/20250312_cay-xang-abc_2_38.png" alt="" id="location-image" style="max-width:100%; height:auto; display:block; margin:0 auto;">
                </div>
                <h3 id="location-name"></h3>
                <p><strong>📍 Địa chỉ:</strong> <span id="location-address"></span></p>
                <p><strong>⏰ Giờ hoạt động:</strong> <span id="operation-time"></span></p>
                <p><strong>📞 Điện thoại:</strong> <span id="location-phone"></span></p>
                <p><strong>📏 Khoảng cách:</strong> <span id="location-distance"></span></p>
                <button id="btn-route" onclick="showRoute()">🚗 Chỉ đường</button>
          </div>
        <!-- Bài Đánh Giá -->
            <div id="reviews-section">
                    <h4>📢 Đánh giá của khách hàng:</h4>
                    <div id="reviews-list"></div>
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
  
  <!-- <div id="info-panel" class="hidden">
    <button id="close-btn">❌</button>
    <div id="info-content">
      <div data-location-id="1">
        <img src="" alt="Tên địa điểm" style="max-width:100%; height:auto; display:block; margin:0 auto;">
        <h3>Tên địa điểm</h3>
        <p><strong>Đánh giá:</strong> ⭐⭐⭐⭐☆ (4.5/5)</p>

        <div id="tab-content">
          
          <div class="tab-panel active" id="overview">
            <p><strong>📍 Địa chỉ:</strong> Địa chỉ mẫu</p>
            <p><strong>⏰ Giờ hoạt động:</strong> 08:00 - 22:00</p>
            <p><strong>📞 Điện thoại:</strong> 0123 456 789</p>
          </div>
          <hr>

          
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
  </div> -->

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
    // var gasStationIcon = L.icon({
    //     iconUrl: 'resources/gas-station.png', // Đường dẫn đến ảnh
    //     iconSize: [20, 20], // Kích thước icon (chiều rộng, chiều cao)
    //     iconAnchor: [20, 40], // Điểm neo của icon (nằm dưới cùng ở giữa)
    //     popupAnchor: [0, -40] // Điểm neo của popup
    // });
    // var userIcon = L.icon({
    //     iconUrl: '/assets/images/location.png', // Đường dẫn đến ảnh
    //     iconSize: [20, 20], // Kích thước icon (chiều rộng, chiều cao)
    //     iconAnchor: [20, 40], // Điểm neo của icon (nằm dưới cùng ở giữa)
    //     popupAnchor: [0, -40] // Điểm neo của popup
    // });



    
    // function getStarRating(rating) {
    //   var fullStar = '⭐';
    //   var stars = "";
    //   for (var i = 1; i <= 5; i++) {
    //       stars += i <= Math.floor(rating) ? fullStar : "☆";
    //   }
    //   return stars;
    // }

    // function showInfoPanel() {
    //   document.getElementById("info-panel").classList.add("show");
    //   document.getElementById("map").classList.add("expanded");
    // }
    // function hideInfoPanel() {
    //   document.getElementById("info-panel").classList.remove("show");
    //   document.getElementById("map").classList.remove("expanded");
    // }
    
    
    // Định nghĩa icon cây xăng
    var gasStationIcon = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/6686/6686706.png', 
        iconSize: [40, 40], // Kích thước của logo
        iconAnchor: [20, 40], // Điểm neo của icon
        popupAnchor: [1, -34] // Điểm neo của popup
    });

        // Duyệt qua từng địa điểm để thêm marker với icon cây xăng
        locations.forEach(function(location) {
            var marker = L.marker(location.coords, { icon: gasStationIcon }).addTo(map);

            marker.bindPopup(`<h3>${location.name}</h3><p>📍 ${location.address}</p><p>📞 ${location.phone}</p>`);
        });
    //icon sài được nhưng chưa đúng hình
    locations.forEach(function(location) {
        var marker = L.marker(location.coords).addTo(map);
        marker.bindPopup(`<h3>${location.name}</h3><p>📍 ${location.address}</p><p>📞 ${location.phone}</p>`);
    });


    //icon cay xăng
    var icon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/6686/6686706.png', 
                iconSize: [40, 40], // Kích thước của logo
                iconAnchor: [20, 40], // Vị trí của logo
                popupAnchor: [1, -34] // Vị trí của popup
            });

    // locations.forEach(function(location) {
    //   var marker = L.marker(location.coords).addTo(map);
            
    //         marker.setIcon(icon);
    //         marker.addTo(map);

            
    //   // ❌ Popup KHÔNG chứa hình ảnh
    //   // var popupContent = `
    //   //   <div data-location-id="${location.id}">
    //   //     <h3 style="margin: 5px 0;">${location.name}</h3>
    //   //     <p style="margin: 5px 0; font-size: 16px;">Đánh giá: ${getStarRating(location.rating)} (${location.rating}/5)</p>
    //   //     <p style="margin: 5px 0; font-size: 14px;">⏰ Giờ mở cửa: <b>${location.openHours}</b></p>
    //   //   </div>
    //   // `;
    //   //marker.bindPopup(popupContent);
      
    //   marker.on("mouseover", function() { 
    //     this.openPopup();
    //   });
    //   marker.on("mouseout", function() { 
    //     this.closePopup();
    //   });
      



    //   // ✅ Panel bên trái sẽ HIỂN THỊ hình ảnh
    //   marker.on("click", function() {
    //     document.getElementById("info-content").innerHTML = `
    //         // <div data-location-id="${location.id}">
    //         // <img src="${location.image}" alt="${location.name}" style="max-width:100%; height:auto; display:block; margin:0 auto;">
    //         // <h3>${location.name}</h3>
    //         // <p><strong>Đánh giá:</strong> ${getStarRating(location.rating)
    //         } 
    //         // (${location.rating}/5)</p>
        
    //         <div id="tab-content">
    //             <!-- Tab 1: Tổng Quan -->
    //             // <div class="tab-panel active" id="overview">
    //             //     <p><strong>📍 Địa chỉ:</strong> ${location.address}<span id="place-address"></span></p>
    //             //     <p><strong>⏰ Giờ hoạt động:</strong> ${location.openHours} <span id="place-hours"></span></p>
    //             //     <p><strong>📞 Điện thoại:</strong> ${location.phone}<span id="place-phone"></span></p>
    //             // </div>
    //             <hr>

    //             <!-- Bài Đánh Giá -->
    //             <div id="reviews">
    //                 <h3>📢 Bài Đánh Giá</h3>
    //                 <div id="review-list">
    //                 ${location.reviews.length > 0 
    //                     ? location.reviews.map(review => `
    //                         <div class="review-item">
    //                             <p><strong>${review.name}</strong> - ${getStarRating(review.rating)}</p>
    //                             <p>💬 ${review.comment}</p>
                                
    //                         </div>
    //                     `).join('')
    //                     : "<p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>"
                        
    //   }
    //                 // <h3>Thêm Đánh Giá</h3>
    //                 // <form id="review-form">
    //                 //   <input type="text" id="review-name" placeholder="Tên bạn" required><br>
    //                 //   <select id="review-rating">
    //                 //     <option value="5">⭐⭐⭐⭐⭐</option>
    //                 //     <option value="4">⭐⭐⭐⭐</option>
    //                 //     <option value="3">⭐⭐⭐</option>
    //                 //     <option value="2">⭐⭐</option>
    //                 //     <option value="1">⭐</option>
    //                 //   </select><br>
    //                 //   <textarea id="review-comment" placeholder="Nhận xét của bạn" required></textarea><br>
    //                 //   <button type="submit">Gửi</button>
    //                 // </form>
    //                 </div>
    //             </div>
    //         </div>

    //       </div>
    //     `;
    //     showInfoPanel();
    //   });
    // });


let userLat, userLon;
navigator.geolocation.getCurrentPosition(function (position) {
    userLat = position.coords.latitude;
    userLon = position.coords.longitude;
    var userLocation = L.marker([userLat, userLon]).addTo(map);
    userLocation.setIcon(userIcon);
    userLocation.addTo(map);
    userLocation.bindPopup("Vị trí của bạn").openPopup();
    map.setView([userLat, userLon], 15);
    FetchLocation(userLat, userLon);
}, function (error) {
    console.error("Không thể lấy vị trí của bạn:", error);
    FetchLocation(10.04501, 105.78088);
});

var locations = [
    @foreach ($gasStations as $station)
        {
            id: {{ $station->id }},
            name: "{{ ($station->name) }}",
            address: "{{($station->address) }}",
            phone: "{{ $station->phone }}",
            operation_time: "{{ $station->operation_time }}",
            image: "{{ asset('storage/' . $station->image) }}",
            coords: [{{ $station->latitude }}, {{ $station->longitude }}],
            rating: {{ $station->rating ?? 0 }} // Nếu rating null thì mặc định 0
        } @if (!$loop->last), @endif
    @endforeach
];

// async function FetchLocation(Lat, Lon) {
//     try {
//         fetch(`http://127.0.0.1:8000/gas-station/FindGas?latitude=${Lat}&longitude=${Lon}`)
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error("Lỗi khi lấy dữ liệu từ API");
//             }
//             return response.json();
//         })
//         .then(data => {
//           console.log(data);  // Thêm dòng này để kiểm tra dữ liệu trả về từ API
//             if (!Array.isArray(data)) {
//                 console.error("Dữ liệu API không hợp lệ:", data);
//                 return;
//             }

//             data.forEach(location => {
//                 const lat = parseFloat(location.latitude);
//                 const lon = parseFloat(location.longitude);

//                 var marker = L.marker([lat, lon]).addTo(map);
//                 marker.setIcon(icon);
//                 marker.addTo(map);
                
//                 var popupContent = `
//                     <div>
//                         <h3>${location.name}</h3>
//                         <p>📍 ${location.address}</p>
//                         <p>📞 ${location.phone}</p>
//                         <p>📏 Cách bạn: <b>${location.distance} km</b></p>
//                     </div>
//                 `;
//                 marker.bindPopup(popupContent);

//                 // Khi click vào marker, cập nhật nội dung cho panel bên trái
//                 marker.on("click", function () {
                  
//                     // Cập nhật thông tin trong panel bên trái
//                     document.getElementById("location-image").src = location.image;
//                     document.getElementById("location-name").textContent = location.name;
//                     document.getElementById("location-address").textContent = location.address;
//                     document.getElementById("operation-time").textContent = location.operation_time;
//                     document.getElementById("location-phone").textContent = location.phone;
//                     document.getElementById("location-distance").textContent = `${location.distance} km`;
//                     document.getElementById("btn-route").onclick = function() {
//                         showRoute(Lat, Lon, lat, lon);
//                     };
//                     // Cập nhật phần đánh giá
//                     let reviewsHtml = '';
//                     if (location.reviews && location.reviews.length > 0) {
//                         location.reviews.forEach(review => {
//                             reviewsHtml += `
//                                 <div class="review-item">
//                                     <p><strong>${review.name || 'Ẩn danh'}</strong> - ⭐ ${review.rating}/5</p>
//                                     <p>💬 ${review.comment}</p>
//                                 </div>
//                             `;
//                         });
//                     } else {
//                         reviewsHtml = "<p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>";
//                     }
//                     document.getElementById("reviews-list").innerHTML = reviewsHtml;

//                     // Hiển thị panel bên trái
//                     showInfoPanel();
//                 });
//             });
//         });

//     } catch (error) {
//         console.error("Lỗi khi lấy dữ liệu:", error);
//     }
// }

// async function FetchLocation(Lat, Lon) {
//     try {
//         fetch(`http://127.0.0.1:8000/gas-station/FindGas?latitude=${Lat}&longitude=${Lon}`)
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error("Lỗi khi lấy dữ liệu từ API");
//             }
//             return response.json();
//         })
//         .then(data => {
//             if (!Array.isArray(data)) {
//                 console.error("Dữ liệu API không hợp lệ:", data);
//                 return;
//             }

//             data.forEach(location => {
//                 const lat = parseFloat(location.latitude);
//                 const lon = parseFloat(location.longitude);

//                 var marker = L.marker([lat, lon]).addTo(map);
//                 marker.setIcon(icon);
//                 marker.addTo(map);
                
//                 var popupContent = `
//                     <div>
//                         <h3>${location.name}</h3>
//                         <p>📍 ${location.address}</p>
//                         <p>📞 ${location.phone}</p>
//                         <p>📏 Cách bạn: <b>${location.distance} km</b></p>
//                     </div>
//                 `;
//                 marker.bindPopup(popupContent);

//                 // Khi click vào marker, cập nhật nội dung cho panel bên trái
//                 marker.on("click", function () {
//                     document.getElementById("info-content").innerHTML = `
//                         <div class="tab-panel active" id="overview">
//                             <img src="${location.image}" alt="${location.name}" style="max-width:100%; height:auto; display:block; margin:0 auto;">
//                             <h3>${location.name}</h3>
//                             <p><strong>📍 Địa chỉ:</strong> ${location.address}</p>
//                             <p><strong>⏰ Giờ hoạt động:</strong> ${location.operation_time}</p>
//                             <p><strong>📞 Điện thoại:</strong> ${location.phone}</p>
//                             <p><strong>📏 Khoảng cách:</strong> ${location.distance} km</p>
//                             <button id="btn-route" onclick="showRoute(${Lat}, ${Lon}, ${lat}, ${lon})">🚗 Chỉ đường</button>

//                             <div id="reviews">
//                                 <p><strong>⭐ Đánh giá trung bình:</strong> ${location.rating ?? 'Chưa có đánh giá'}</p>
//                                 <h4>📢 Đánh giá của khách hàng:</h4>
//                                 <div class="reviews">
//                                     ${location.reviews && location.reviews.length > 0
//                                         ? location.reviews.map(review => `
//                                             <div class="review-item">
//                                                 <p><strong>${review.name || 'Ẩn danh'}</strong> - ⭐ ${review.rating}/5</p>
//                                                 <p>💬 ${review.comment}</p>
//                                             </div>
//                                         `).join('')
//                                         : "<p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>"
//                                     }
//                                 </div>
//                             </div>
//                         </div>
//                     `;

//                     // Gọi hàm hiển thị panel bên trái
//                     showInfoPanel();
//                 });
//             });
//         });

//     } catch (error) {
//         console.error("Lỗi khi lấy dữ liệu:", error);
//     }
// }


async function FetchLocation(Lat, Lon) {
    try {
        const response = await fetch(`http://127.0.0.1:8000/gas-station/FindGas?latitude=${Lat}&longitude=${Lon}`);
        
        if (!response.ok) {
            throw new Error("Lỗi khi lấy dữ liệu từ API");
        }
        
        const data = await response.json();
        if (!Array.isArray(data)) {
            console.error("Dữ liệu API không hợp lệ:", data);
            return;
        }

        data.forEach(location => {
            const lat = parseFloat(location.latitude);
            const lon = parseFloat(location.longitude);

            if (!isNaN(lat) && !isNaN(lon)) {
                const marker = L.marker([lat, lon]).addTo(map);
                marker.setIcon(icon);  // Kiểm tra nếu bạn có icon
                marker.addTo(map);

                var popupContent = `
                    <div>
                        <h3>${location.name}</h3>
                        <p>📍 ${location.address}</p>
                        <p>📞 ${location.phone}</p>
                        <p>📏 Cách bạn: <b>${location.distance} km</b></p>
                    </div>
                `;
                marker.bindPopup(popupContent);
            } else {
                console.error('Tọa độ không hợp lệ:', location.latitude, location.longitude);
            }
        });
    } catch (error) {
        console.error("Lỗi khi lấy dữ liệu:", error);
    }
}



// Hàm hiển thị panel bên trái
function showInfoPanel() {
    const infoPanel = document.getElementById("info-panel");
    if (infoPanel) {
        infoPanel.classList.add("show"); // Thêm lớp 'show' để panel trượt vào
    }
}
// Hàm đóng panel bên trái
function hideInfoPanel() {
    const infoPanel = document.getElementById("info-panel");
    if (infoPanel) {
        infoPanel.classList.remove("show"); // Loại bỏ lớp 'show' để panel trượt ra ngoài
    }
}
// Đóng panel khi click vào nút đóng
document.getElementById("close-btn")?.addEventListener("click", hideInfoPanel);







var currentRoute = null;
// Hàm hiển thị đường đi
function showRoute(userLat, userLon, destLat, destLon) {
  // Xóa tuyến đường cũ nếu có
  if (currentRoute) {
    map.removeControl(currentRoute);
  }

  // Tạo tuyến đường mới
  currentRoute = L.Routing.control({
    waypoints: [
      L.latLng(userLat, userLon), // Vị trí của bạn
      L.latLng(destLat, destLon) // Trạm xăng được click
    ],
    routeWhileDragging: true
  }).addTo(map);
}

    FetchLocation();
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
