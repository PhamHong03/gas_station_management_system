@include('clients.layouts.header')

<body>
  <!-- Map Container -->
  <div id="map">
    <div id="search-box">
      <input type="text" id="search-input" placeholder="Nhập địa chỉ...">
      <button id="search-btn">🔍</button>
    </div>
  </div>
  
  <!-- Panel Thông tin bên trái -->
  <div id="info-panel">
    <button id="close-btn">❌</button>
    <h2>Thông Tin Địa Điểm</h2>
    <div id="info-content">
      <p>Chọn một địa điểm trên bản đồ để xem chi tiết.</p>
    </div>
  </div>
  
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


    L.Marker.prototype.options.icon = L.icon({
        iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png',
        shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png'
    });


    var map = new L.map('map', mapOptions);
    var layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(layer);
    
    var geocoder = L.Control.Geocoder.nominatim();
    var control = L.Control.geocoder({
      geocoder: geocoder,
      defaultMarkGeocode: true
    }).addTo(map);
    
    control.on("markgeocode", function(e) {
        var center = e.geocode.center; // Lấy tọa độ vị trí tìm kiếm được
        L.marker(center).addTo(map) // Thêm marker vào vị trí vừa tìm thấy
            .bindPopup(e.geocode.name) // Hiển thị tên địa điểm trong popup
            .openPopup();
        map.setView(center, 15); // Di chuyển bản đồ đến vị trí đó
        });


    // Tạo icon mặc định cho cây xăng
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
    */
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

    var icon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/6686/6686706.png', // Đường dẫn đến logo Đại học Cần Thơ
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
      var popupContent = `
        <div data-location-id="${location.id}">
          <h3 style="margin: 5px 0;">${location.name}</h3>
          <p style="margin: 5px 0; font-size: 16px;">Đánh giá: ${getStarRating(location.rating)} (${location.rating}/5)</p>
          <p style="margin: 5px 0; font-size: 14px;">⏰ Giờ mở cửa: <b>${location.openHours}</b></p>
        </div>
      `;
      marker.bindPopup(popupContent);
      
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
                    </div>
                </div>
            </div>

          </div>
        `;
        showInfoPanel();
      });
    });
*/

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

async function FetchLocation(Lat, Lon) {
    try {
        
        fetch(`http://127.0.0.1:8000/gas-station/FindGas?latitude=${Lat}&longitude=${Lon}`)
        .then(response => {
            if (!response.ok) {
                throw new Error("Lỗi khi lấy dữ liệu từ API");
            }
            return response.json();
        })
        .then(data=>{
          if(!Array.isArray(data)){
            console.error("Dữ liệu API không hợp lệ:", data);
            return;
          }
          data.forEach(location => {
            const lat = parseFloat(location.latitude);
            const lon = parseFloat(location.longitude);

            var marker = L.marker([lat, lon], ).addTo(map);
            marker.setIcon(icon);
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

            marker.on("click", function () {

                document.getElementById("info-content").innerHTML = `
                    <div>
                        <h3>${location.name}</h3>
                        <p><strong>📍 Địa chỉ:</strong> ${location.address}</p>
                        <p><strong>📞 Điện thoại:</strong> ${location.phone}</p>
                        <p><strong>📏 Khoảng cách:</strong> ${location.distance} km</p>
                        <button onclick="showRoute(${Lat}, ${Lon}, ${lat}, ${lon})">🚗 Chỉ đường</button>
                    </div>
                `;
                showInfoPanel();
            });
          });
        })

    } catch (error) {
        console.error("Lỗi khi lấy dữ liệu:", error);
    }
}

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

  </script>
</body>
</html>
