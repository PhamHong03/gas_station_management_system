@include('clients.layouts.header')

<body>
    <!-- Map Container -->
    <div id="user-avatar">
        <img src="storage/gas_station/avatar.jpg" alt="User Avatar">
    </div>
    <!-- người dùng -->
    <div id="popup_avatar">
        @if (Auth::check())
            <p><strong>{{ Auth::user()->name }}</strong></p>
            <p>Email: {{ Auth::user()->email }}</p>
            <!-- Hide "Đăng nhập" if logged in -->
            <a href="{{ route('logout') }}" method="POST" class="popup-item" id="logout-form">Đăng Xuất</a>
        @else
            <!-- Show "Đăng nhập" if not logged in -->
            <a href="{{ route('login') }}" class="popup-item" id="login-btn">Đăng nhập</a>
        @endif
    </div>
    <div id="map">
        <div id="search-box">
            <input type="text" id="search-input" placeholder="Nhập địa chỉ...">
            <button id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            <i id="nav-icon" class="fa-solid fa-diamond-turn-right"></i>
        </div>
        <div id="navigation-form">
            <button id="nav-close-btn"><i class="fa-solid fa-xmark" style="color: #a50000;"></i></button>
            <div id="selectnavigationandnumber">
                <select id="fueltypes-form">
                    <option value="">Chọn loại xăng</option>
                    @foreach ($fuelTypes as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>

                <select name="operation_time" id="operation-time">
                    <option value="">Tất cả thời gian hoạt động</option>
                    @foreach($operationTimes as $time)
                        <option value="{{ $time }}">{{ $time }}</option>
                    @endforeach
                </select>
                <input type="text" id="number-location" placeholder="Nhập khoảng cách...">
            </div>
            <div class="find-route-btn-div">
                <button id="find-route-btn" class="btn-form">Tìm đường</button>
            </div>
        </div>
    </div>
    </div>

    <div id="danhmuc">
        <button class="category-btn">Cửa hàng xăng</button>
        <button class="category-btn">Trạm sạc điện</button>
        <button class="category-btn">Cây ATM</button>
    </div>
    <!-- Panel Thông tin bên trái -->
    <div id="info-panel">
        <button id="close-btn"><i class="fa-solid fa-xmark" style="color: #a50000;"></i></button>
        <div id="overview-image">
            <img src="" alt="" id="location-image"
                style="max-width:100%; height:auto; display:block; margin:0 auto;">
        </div>
        <div id="info-content">
            <!-- Tab 1: Tổng Quan -->
            <div class="tab-panel active" id="overview">
                <div>
                    <h3 id="location-name"></h3>
                    <p><strong><i class="fa-solid fa-location-dot" style="color: #0091ff;"></i> Địa chỉ:</strong> <span
                            id="location-address"></span></p>
                    <p><strong><i class="fa-solid fa-clock" style="color: #0091ff;"></i> Giờ hoạt động:</strong> <span
                            id="operation-time"></span></p>
                    <p><strong><i class="fa-solid fa-phone" style="color: #0091ff;"></i> Điện thoại:</strong> <span
                            id="location-phone"></span></p>
                    <p><strong><i class="fa-solid fa-ruler" style="color: #0091ff;"></i> Khoảng cách:</strong> <span
                            id="location-distance"></span></p>
                    <div class="button-container">
                        <button id="btn-route" class="button-container" onclick="showRoute()"><i
                                class="fa-solid fa-route"></i> Chỉ đường</button>
                    </div>
                </div>
            </div>
            <!-- Bài Đánh Giá -->
            <div id="reviews-section">
                <h4>Đánh giá của khách hàng:</h4>
                <div id="reviews-list">
                    <p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>
                </div>
                <div class="button-container"><button id="btnOpenReviewPopup"><i class="fa-solid fa-pen"></i> Thêm đánh
                        giá</button>
                </div>
            </div>
        </div>
    </div>
    <div id="reviewPopupContainer" class="review-popup">
        <div class="review-popup-content">
            <div class="review-popup-header">
                <h2 class="review-popup-title">Chợ nổi Cái Răng</h2>
            </div>
            <div class="review-user-info">
                <div class="review-user-avatar">
                    <span class="review-avatar-letter">N</span>
                </div>
                <div class="review-user-details">
                    <strong class="review-user-name">Ngoc Thao Nguyen</strong>
                </div>
            </div>
            <div class="review-rating">
                <span class="review-star">&#9734;</span>
                <span class="review-star">&#9734;</span>
                <span class="review-star">&#9734;</span>
                <span class="review-star">&#9734;</span>
                <span class="review-star">&#9734;</span>
            </div>
            <input type="text" class="review-textarea"
                placeholder="Mô tả cụ thể trải nghiệm của bạn tại địa điểm này">
            <div class="review-popup-buttons">
                <button id="btnCancelReview" class="review-cancel-button">Huỷ</button>
                <button id="btnSubmitReview" class="review-submit-button" data-location-id="123">Đăng</button>
                <!-- gasStationId -->
            </div>
        </div>
    </div>


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
        L.Marker.prototype.options.icon = L.icon({
            iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png',
            shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png'
        });
        // Di chuyển bản đồ đến vị trí đó
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
        // Định nghĩa icon cây xăng
        var gasStationIcon = L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/6686/6686706.png',
            iconSize: [35, 35], // Kích thước của logo
            iconAnchor: [20, 40], // Điểm neo của icon
            popupAnchor: [1, -34] // Điểm neo của popup
        });
        var locations = [
            @foreach ($gasStations as $station)
                {
                    id: {{ $station->id }},
                    name: "{{ $station->name }}",
                    address: "{{ $station->address }}",
                    phone: "{{ $station->phone }}",
                    operation_time: "{{ $station->operation_time }}",
                    image: "{{ asset('storage/' . $station->image) }}",
                    coords: [{{ $station->latitude }}, {{ $station->longitude }}],
                    rating: {{ $station->rating ?? 0 }},
                    reviews: [
                        @if (!empty($station->reviews))
                            @foreach ($station->reviews as $review)
                                {
                                    name: "{{ $review->user->name ?? 'Ẩn danh' }}",
                                    rating: {{ $review->rating }},
                                    comment: "{{ $review->content }}"
                                }
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        @endif
                    ]
                }
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
        ];
        const loggedInUserName =
            "{{ Auth::user()->name ?? 'Ẩn danh' }}"; // Lấy tên người dùng hoặc 'Ẩn danh' nếu chưa đăng nhập

        let selectedGasStationId = null;

        locations.forEach(location => {
            const marker = L.marker(location.coords, {
                icon: gasStationIcon
            }).addTo(map); // Sử dụng gasStationIcon cho marker

            let averageRating = 0;
            if (location.reviews && location.reviews.length > 0) {
                let totalRating = 0;
                location.reviews.forEach(review => {
                    totalRating += review.rating;
                });
                averageRating = totalRating / location.reviews.length;
            }
            // Tạo nội dung popup cho marker
            const popupContent = `
            <div>
                <h3>${location.name}</h3>
                <p><i class="fa-solid fa-location-dot" style="color: #0091ff;"></i> ${location.address}</p>
                <p><i class="fa-solid fa-phone" style="color: #0091ff;"></i> ${location.phone}</p>
                <p><i class="fa-solid fa-ruler" style="color: #0091ff;"></i> Cách bạn: <b>${location.distance} km</b></p>
                <p><i class="fa-solid fa-clock" style="color: #0091ff;"></i> Thời gian hoạt động: ${location.operation_time}</p>
                <p><i class="fa-solid fa-star" style="color: #FFD43B;"></i> Đánh giá: ${averageRating.toFixed(1)}/5</p>
            </div>
        `;
            marker.bindPopup(popupContent);
            // Khi click vào marker, cập nhật nội dung cho panel bên trái
            marker.on("click", function() {
                // Cập nhật thông tin trong panel bên trái
                document.getElementById("location-image").src = location.image;
                document.getElementById("location-name").textContent = location.name;
                document.getElementById("location-address").textContent = location.address;
                document.getElementById("operation-time").textContent = location.operation_time;
                document.getElementById("location-phone").textContent = location.phone;
                document.getElementById("location-distance").textContent = `${location.distance} km`;
                document.querySelector('.review-popup-title').textContent = location.name;
                document.querySelector('.review-user-name').textContent =
                    loggedInUserName; // Bạn có thể thay đổi tên người dùng nếu cần
                document.querySelector('.review-textarea').value =
                    ""; // Xóa nội dung textarea khi mở popup mới
                // Cập nhật phần đánh giá

                selectedGasStationId = location.id;

                let reviewsHtml = '';
                if (location.reviews && location.reviews.length > 0) {
                    location.reviews.forEach(review => {
                        reviewsHtml += `
                        <div class="review-item">
                            <p><strong>${review.name || 'Ẩn danh'}</strong> - <i class="fa-solid fa-star" style="color: #FFD43B;"></i> ${review.rating}/5</p>
                            <p>💬 ${review.comment}</p>
                        </div>
                    `;
                    });
                } else {
                    reviewsHtml = "<p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>";
                }
                document.getElementById("reviews-list").innerHTML = reviewsHtml;

                // Hiển thị panel bên trái (nếu cần)
                showInfoPanel();
            });
        });

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
        document.getElementById("close-btn").addEventListener("click", hideInfoPanel);
        // Hiển thị form navigation khi click vào icon
        document.getElementById("nav-icon").addEventListener("click", showNavForm);
        // Ẩn form navigation khi click vào nút đóng
        document.getElementById("nav-close-btn").addEventListener("click", hideNavForm);
        // Hàm để hiển thị form
        function showNavForm() {
            document.getElementById("navigation-form").style.display = "block";
        }
        // Hàm để ẩn form
        function hideNavForm() {
            document.getElementById("navigation-form").style.display = "none";
        }
        document.addEventListener("DOMContentLoaded", function() {
            const avatar = document.getElementById("user-avatar");
            const popup = document.getElementById("popup_avatar");

            // Toggle hiển thị popup khi nhấn avatar
            avatar.addEventListener("click", function(event) {
                popup.classList.toggle("show"); // Hiển thị hoặc ẩn popup
                event.stopPropagation(); // Ngăn chặn sự kiện lan ra ngoài
            });

            // Ẩn popup khi nhấn bên ngoài
            document.addEventListener("click", function(event) {
                if (!avatar.contains(event.target) && !popup.contains(event.target)) {
                    popup.classList.remove("show"); // Ẩn popup
                }
            });
        });
        btnSubmitReview.addEventListener('click', function() {
            const gasStationId = selectedGasStationId; // Hoặc cách lấy gasStationId bạn đang dùng
            const rating = document.querySelectorAll('.review-star.active').length;
            const content = document.querySelector('.review-textarea').value;
            const userName = document.querySelector('.review-user-name').textContent;

            if (!gasStationId) {
                alert('Vui lòng chọn một trạm xăng trước khi đánh giá!');
                return;
            }
            if (rating === 0) {
                alert('Vui lòng chọn số sao!');
                return;
            }
            if (!content.trim()) {
                alert('Vui lòng nhập nội dung đánh giá!');
                return;
            }

            console.log('Sending request to:', '/reviews/store');
            console.log('Data:', {
                gasStationId,
                rating,
                content
            });

            fetch('/reviews/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        gasStationId: gasStationId,
                        rating: rating,
                        content: content
                    })
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    return response.text(); // Lấy nội dung thô
                })
                .then(text => {
                    console.log('Response text:', text); // In nội dung phản hồi
                    try {
                        const data = JSON.parse(text); // Thử parse thành JSON
                        if (data.success) {
                            const reviewsList = document.getElementById('reviews-list');
                            reviewsList.innerHTML += `
                    <div class="review-item">
                        <p><strong>${userName}</strong> - ⭐ ${rating}/5</p>
                        <p>💬 ${content}</p>
                    </div>
                `;
                            reviewPopupContainer.style.display = 'none';
                            document.querySelector('.review-textarea').value = '';
                            reviewStars.forEach(star => star.classList.remove('active'));
                        } else {
                            alert('Có lỗi xảy ra: ' + data.message);
                        }
                    } catch (e) {
                        console.error('Parse error:', e);
                        alert('Server trả về lỗi không phải JSON: ' + text);
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    alert('Đã có lỗi xảy ra khi gửi đánh giá.');
                });
        });

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

        // button navigation
        function showNavForm() {
            document.getElementById("navigation-form").classList.add("show");
            document.getElementById("map").classList.add("expanded");

        }

        function hideNavForm() {
            document.getElementById("navigation-form").classList.remove("show");
            document.getElementById("map").classList.remove("expanded");
        }

        const btnOpenReviewPopup = document.getElementById('btnOpenReviewPopup');
        const reviewPopupContainer = document.getElementById('reviewPopupContainer');
        const btnCancelReview = document.getElementById('btnCancelReview');
        const reviewStars = document.querySelectorAll('.review-star');

        btnOpenReviewPopup.addEventListener('click', () => {
            reviewPopupContainer.style.display = 'flex';
        });

        btnCancelReview.addEventListener('click', () => {
            reviewPopupContainer.style.display = 'none';
        });

        reviewStars.forEach((star, index) => {
            star.addEventListener('click', () => {
                for (let i = 0; i <= index; i++) {
                    reviewStars[i].classList.add('active');
                }
                for (let i = index + 1; i < reviewStars.length; i++) {
                    reviewStars[i].classList.remove('active');
                }
            });
        });
    </script>
</body>


</html>

{{-- // let userLat, userLon;
// navigator.geolocation.getCurrentPosition(function (position) {
// userLat = position.coords.latitude;
// userLon = position.coords.longitude;
// var userLocation = L.marker([userLat, userLon]).addTo(map);
// userLocation.setIcon(userIcon);
// userLocation.addTo(map);
// userLocation.bindPopup("Vị trí của bạn").openPopup();
// map.setView([userLat, userLon], 15);
// FetchLocation(userLat, userLon);
// }, function (error) {
// console.error("Không thể lấy vị trí của bạn:", error);
// FetchLocation(10.04501, 105.78088);
// });




// async function FetchLocation(Lat, Lon) {
// try {
// fetch(`http://127.0.0.1:8000/gas-station/FindGas?latitude=${Lat}&longitude=${Lon}`)
// .then(response => {
// if (!response.ok) {
// throw new Error("Lỗi khi lấy dữ liệu từ API");
// }
// return response.json();
// })
// .then(data => {
// console.log(data); // Thêm dòng này để kiểm tra dữ liệu trả về từ API
// if (!Array.isArray(data)) {
// console.error("Dữ liệu API không hợp lệ:", data);
// return;
// }

// data.forEach(location => {
// const lat = parseFloat(location.latitude);
// const lon = parseFloat(location.longitude);

// var marker = L.marker([lat, lon]).addTo(map);
// marker.setIcon(icon);
// marker.addTo(map);

// var popupContent = `
// <div>
    // <h3>${location.name}</h3>
    // <p>📍 ${location.address}</p>
    // <p>📞 ${location.phone}</p>
    // <p>📏 Cách bạn: <b>${location.distance} km</b></p>
    // </div>
// `;
// marker.bindPopup(popupContent);

// // Khi click vào marker, cập nhật nội dung cho panel bên trái
// marker.on("click", function () {

// // Cập nhật thông tin trong panel bên trái
// document.getElementById("location-image").src = location.image;
// document.getElementById("location-name").textContent = location.name;
// document.getElementById("location-address").textContent = location.address;
// document.getElementById("operation-time").textContent = location.operation_time;
// document.getElementById("location-phone").textContent = location.phone;
// document.getElementById("location-distance").textContent = `${location.distance} km`;
// document.getElementById("btn-route").onclick = function() {
// showRoute(Lat, Lon, lat, lon);
// };
// // Cập nhật phần đánh giá
// let reviewsHtml = '';
// if (location.reviews && location.reviews.length > 0) {
// location.reviews.forEach(review => {
// reviewsHtml += `
// <div class="review-item">
    // <p><strong>${review.name || 'Ẩn danh'}</strong> - ⭐ ${review.rating}/5</p>
    // <p>💬 ${review.comment}</p>
    // </div>
// `;
// });
// } else {
// reviewsHtml = "<p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>";
// }
// document.getElementById("reviews-list").innerHTML = reviewsHtml;

// // Hiển thị panel bên trái
// showInfoPanel();
// });
// });
// });

// } catch (error) {
// console.error("Lỗi khi lấy dữ liệu:", error);
// }
// }

// async function FetchLocation(Lat, Lon) {
// try {
// fetch(`http://127.0.0.1:8000/gas-station/FindGas?latitude=${Lat}&longitude=${Lon}`)
// .then(response => {
// if (!response.ok) {
// throw new Error("Lỗi khi lấy dữ liệu từ API");
// }
// return response.json();
// })
// .then(data => {
// if (!Array.isArray(data)) {
// console.error("Dữ liệu API không hợp lệ:", data);
// return;
// }

// data.forEach(location => {
// const lat = parseFloat(location.latitude);
// const lon = parseFloat(location.longitude);

// var marker = L.marker([lat, lon]).addTo(map);
// marker.setIcon(icon);
// marker.addTo(map);

// var popupContent = `
// <div>
    // <h3>${location.name}</h3>
    // <p>📍 ${location.address}</p>
    // <p>📞 ${location.phone}</p>
    // <p>📏 Cách bạn: <b>${location.distance} km</b></p>
    // </div>
// `;
// marker.bindPopup(popupContent);

// // Khi click vào marker, cập nhật nội dung cho panel bên trái
// marker.on("click", function () {
// document.getElementById("info-content").innerHTML = `
// <div class="tab-panel active" id="overview">
    // <img src="${location.image}" alt="${location.name}"
        style="max-width:100%; height:auto; display:block; margin:0 auto;">
    // <h3>${location.name}</h3>
    // <p><strong>📍 Địa chỉ:</strong> ${location.address}</p>
    // <p><strong>⏰ Giờ hoạt động:</strong> ${location.operation_time}</p>
    // <p><strong>📞 Điện thoại:</strong> ${location.phone}</p>
    // <p><strong>📏 Khoảng cách:</strong> ${location.distance} km</p>
    // <button id="btn-route" onclick="showRoute(${Lat}, ${Lon}, ${lat}, ${lon})">🚗 Chỉ đường</button>

    // <div id="reviews">
        // <p><strong>⭐ Đánh giá trung bình:</strong> ${location.rating ?? 'Chưa có đánh giá'}</p>
        // <h4>📢 Đánh giá của khách hàng:</h4>
        // <div class="reviews">
            // ${location.reviews && location.reviews.length > 0
            // ? location.reviews.map(review => `
            // <div class="review-item">
                // <p><strong>${review.name || 'Ẩn danh'}</strong> - ⭐ ${review.rating}/5</p>
                // <p>💬 ${review.comment}</p>
                // </div>
            // `).join('')
            // : "<p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>"
            // }
            // </div>
        // </div>
    // </div>
// `;

// // Gọi hàm hiển thị panel bên trái
// showInfoPanel();
// });
// });
// });

// } catch (error) {
// console.error("Lỗi khi lấy dữ liệu:", error);
// }
// }


// async function FetchLocation(Lat, Lon) {
// try {
// const response = await fetch(`http://127.0.0.1:8000/gas-station/FindGas?latitude=${Lat}&longitude=${Lon}`);

// if (!response.ok) {
// throw new Error("Lỗi khi lấy dữ liệu từ API");
// }

// const data = await response.json();
// if (!Array.isArray(data)) {
// console.error("Dữ liệu API không hợp lệ:", data);
// return;
// }

// data.forEach(location => {
// const lat = parseFloat(location.latitude);
// const lon = parseFloat(location.longitude);

// if (!isNaN(lat) && !isNaN(lon)) {
// const marker = L.marker([lat, lon]).addTo(map);
// marker.setIcon(icon); // Kiểm tra nếu bạn có icon
// marker.addTo(map);

// var popupContent = `
// <div>
    // <h3>${location.name}</h3>
    // <p>📍 ${location.address}</p>
    // <p>📞 ${location.phone}</p>
    // <p>📏 Cách bạn: <b>${location.distance} km</b></p>
    // </div>
// `;
// marker.bindPopup(popupContent);
// } else {
// console.error('Tọa độ không hợp lệ:', location.latitude, location.longitude);
// }
// });
// } catch (error) {
// console.error("Lỗi khi lấy dữ liệu:", error);
// }
// }
// FetchLocation(); --}}
