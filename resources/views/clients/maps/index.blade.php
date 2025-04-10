@include('clients.layouts.header')

<head>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --accent-color: #f59e0b;
            --dark-color: #111827;
            --light-color: #f9fafb;
            --danger-color: #ef4444;
            --success-color: #10b981;
        }
        
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background: #f1f5f9;
            height: 100vh;
            position: relative;
        }
        
        /* Map container */
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100vh;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        #map.expanded {
            width: calc(100% - 380px);
        }
        
        /* Search box styling */
        #search-box {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            width: 80%;
            max-width: 500px;
            z-index: 1000;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            background: white;
            overflow: hidden;
        }
        
        #search-input {
            flex-grow: 1;
            padding: 12px 20px;
            border: none;
            outline: none;
            font-size: 16px;
            border-radius: 50px 0 0 50px;
        }
        
        #search-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0 20px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        #search-btn:hover {
            background: var(--primary-dark);
        }
        
        #nav-icon {
            background: var(--accent-color);
            color: white;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        #nav-icon:hover {
            background: #e18d09;
        }
        
        /* User avatar */
        #user-avatar {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        
        #user-avatar img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        #user-avatar img:hover {
            transform: scale(1.1);
        }
        
        /* Category buttons */
        #danhmuc {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 1000;
        }
        
        .category-btn {
            background: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 14px;
            color: var(--dark-color);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .category-btn:hover {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            transform: translateY(-2px);
        }
        
        .category-btn.active {
            background: var(--primary-color);
            color: white;
        }
        
        /* Info Panel */
        #info-panel {
            position: absolute;
            top: 0;
            right: -380px;
            width: 380px;
            height: 100vh;
            background: white;
            z-index: 1500;
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        #info-panel.show {
            right: 0;
        }
        
        #close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.8);
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            cursor: pointer;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }
        
        #close-btn:hover {
            background: var(--danger-color);
            color: white;
            transform: rotate(90deg);
        }
        
        #info-content {
            padding: 20px;
            position: relative;
        }
        
        #info-content h3 {
            font-size: 20px;
            margin-top: 15px;
            margin-bottom: 10px;
            color: var(--dark-color);
        }
        
        #info-content img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        #tab-content {
            margin-top: 20px;
        }
        
        .tab-panel {
            margin-bottom: 15px;
        }
        
        .tab-panel p {
            margin: 8px 0;
            font-size: 15px;
            color: var(--secondary-color);
        }
        
        .tab-panel strong {
            color: var(--dark-color);
        }
        
        /* Reviews section */
        #reviews {
            margin-top: 20px;
        }
        
        .review-item {
            background-color: #f8fafc;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 12px;
            border-left: 4px solid var(--primary-color);
        }
        
        .review-item p {
            margin: 5px 0;
        }
        
        #review-form input, 
        #review-form select, 
        #review-form textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
        }
        
        #review-form textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        #review-form button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        #review-form button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }
        
        /* Navigation form */
        #navigation-form {
            position: absolute;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 500px;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            display: none;
        }
        
        #navigation-form.show {
            display: block;
            animation: slideDown 0.3s ease;
        }
        
        #navigation-form input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
        }
        
        #navigation-form input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        #nav-close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        #nav-close-btn:hover {
            color: var(--danger-color);
        }
        
        /* Directions button */
        .directions-btn {
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
            transition: all 0.2s;
        }
        
        .directions-btn:hover {
            background: #e18d09;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }
        
        /* Popup styling */
        .leaflet-popup-content-wrapper {
            border-radius: 10px;
            padding: 0;
            overflow: hidden;
        }
        
        .leaflet-popup-content {
            margin: 0;
            width: 250px !important;
        }
        
        .popup-container {
            padding: 15px;
        }
        
        .popup-title {
            font-size: 16px;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 8px;
        }
        
        .popup-rating, .popup-hours {
            margin: 5px 0;
            font-size: 14px;
        }
        
        @keyframes slideDown {
            from { opacity: 0; transform: translate(-50%, -20px); }
            to { opacity: 1; transform: translate(-50%, 0); }
        }
        
        @media (max-width: 768px) {
            #map.expanded {
                width: 100%;
            }
            
            #info-panel {
                width: 100%;
                right: -100%;
            }
            
            #info-panel.show {
                right: 0;
            }
            
            #search-box {
                width: 90%;
            }
            
            #navigation-form {
                width: 90%;
            }
            
            .category-btn {
                padding: 8px 15px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>
    <!-- User Avatar -->
    <div id="user-avatar">
        <img src="https://i.pravatar.cc/150?img=12" alt="User Avatar">
    </div>

    <!-- Map Container -->
    <div id="map">
        <!-- Search Box -->
        <div id="search-box">
            <input type="text" id="search-input" placeholder="Tìm kiếm địa điểm...">
            <button id="search-btn"><i class="fas fa-search"></i></button>
            <div id="nav-icon"><i class="fas fa-directions"></i></div>
        </div>

        <!-- Navigation Form -->
        <div id="navigation-form">
            <button id="nav-close-btn"><i class="fas fa-times"></i></button>
            <input type="text" id="start-location" placeholder="Điểm xuất phát (để trống nếu là vị trí hiện tại)">
            <input type="text" id="end-location" placeholder="Điểm đến">
            <button id="get-directions" class="directions-btn">
                <i class="fas fa-route"></i> Tìm đường đi
            </button>
        </div>
        
        <!-- Category Filters -->
        <div id="danhmuc">
            <button class="category-btn active" data-type="gas_station">
                <i class="fas fa-gas-pump me-1"></i> Cửa hàng xăng
            </button>
            <button class="category-btn" data-type="charging_station">
                <i class="fas fa-charging-station me-1"></i> Trạm sạc điện
            </button>
            <button class="category-btn" data-type="atm">
                <i class="fas fa-money-bill-wave me-1"></i> Cây ATM
            </button>
        </div>
    </div>

    <!-- Info Panel -->
    <div id="info-panel">
        <button id="close-btn"><i class="fas fa-times"></i></button>
        <div id="info-content">
            <p>Chọn một địa điểm trên bản đồ để xem thông tin chi tiết.</p>
        </div>
    </div>

    <!-- Import Scripts -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Map initialization
            var mapOptions = {
                center: [10.026667, 105.783333],
                zoom: 15
            };

            var map = new L.map('map', mapOptions);
            var layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
            map.addLayer(layer);

            // Geocoder initialization
            var geocoder = L.Control.Geocoder.nominatim();
            var control = L.Control.geocoder({
                geocoder: geocoder,
                defaultMarkGeocode: false,
                position: 'topleft',
                placeholder: 'Tìm kiếm địa điểm...',
                errorMessage: 'Không tìm thấy địa điểm'
            }).addTo(map);

            control.on("markgeocode", function(e) {
                var center = e.geocode.center;
                L.marker(center).addTo(map)
                    .bindPopup(e.geocode.name)
                    .openPopup();
                map.setView(center, 15);
            });

            // Gas station icon
            var icon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/6686/6686706.png',
                iconSize: [40, 40],
                iconAnchor: [20, 40],
                popupAnchor: [1, -34]
            });

            // Store all markers for later filtering
            var allMarkers = [];
            var currentRoute = null;

            // User location handling
            var userLat, userLon;
            var userMarker;

            navigator.geolocation.getCurrentPosition(function(position) {
                userLat = position.coords.latitude;
                userLon = position.coords.longitude;
                
                // User marker
                userMarker = L.marker([userLat, userLon]).addTo(map);
                userMarker.bindPopup("<strong>Vị trí của bạn</strong>").openPopup();
                map.setView([userLat, userLon], 15);
                
                // Fetch gas stations near user
                fetchGasStations(userLat, userLon);
            }, function(error) {
                console.error("Không thể lấy vị trí: ", error);
                
                // Default to Can Tho city center
                userLat = 10.04501;
                userLon = 105.78088;
                map.setView([userLat, userLon], 15);
                
                // Fetch gas stations near default location
                fetchGasStations(userLat, userLon);
            });

            // Format star rating
            function getStarRating(rating) {
                rating = parseFloat(rating) || 0;
                var fullStar = '⭐';
                var stars = "";
                for (var i = 1; i <= 5; i++) {
                    stars += i <= Math.floor(rating) ? fullStar : "☆";
                }
                return stars;
            }

            // Show/hide info panel
            function showInfoPanel() {
                document.getElementById("info-panel").classList.add("show");
                document.getElementById("map").classList.add("expanded");
            }

            function hideInfoPanel() {
                document.getElementById("info-panel").classList.remove("show");
                document.getElementById("map").classList.remove("expanded");
            }

            // Close info panel when clicking the close button
            document.getElementById("close-btn").addEventListener("click", hideInfoPanel);

            // Show/hide navigation form
            function showNavForm() {
                document.getElementById("navigation-form").classList.add("show");
            }

            function hideNavForm() {
                document.getElementById("navigation-form").classList.remove("show");
            }

            // Toggle navigation form
            document.getElementById("nav-icon").addEventListener("click", showNavForm);
            document.getElementById("nav-close-btn").addEventListener("click", hideNavForm);

            // Get directions
            document.getElementById("get-directions").addEventListener("click", function() {
                var start = document.getElementById("start-location").value;
                var end = document.getElementById("end-location").value;
                
                if (!end) {
                    alert("Vui lòng nhập điểm đến!");
                    return;
                }
                
                if (!start && userMarker) {
                    // Use current location as start
                    getDirections(userLat, userLon, null, end);
                } else {
                    // Geocode both start and end
                    getDirections(null, null, start, end);
                }
                
                hideNavForm();
            });

            // Search functionality
            document.getElementById("search-btn").addEventListener("click", function() {
                var query = document.getElementById("search-input").value;
                if (query) {
                    geocoder.geocode(query, function(results) {
                        if (results.length > 0) {
                            var center = results[0].center;
                            L.marker(center).addTo(map)
                                .bindPopup(results[0].name)
                                .openPopup();
                            map.setView(center, 15);
                        } else {
                            alert("Không tìm thấy kết quả cho: " + query);
                        }
                    });
                }
            });
            
            // Handle enter key in search box
            document.getElementById("search-input").addEventListener("keypress", function(e) {
                if (e.key === "Enter") {
                    document.getElementById("search-btn").click();
                }
            });
            
            // Category filter buttons
            var categoryButtons = document.querySelectorAll('.category-btn');
            categoryButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Filter markers by type
                    var type = this.getAttribute('data-type');
                    filterMarkersByType(type);
                });
            });

            // Filter markers by type
            function filterMarkersByType(type) {
                allMarkers.forEach(function(marker) {
                    if (marker.options.type === type || type === 'all') {
                        map.addLayer(marker);
                    } else {
                        map.removeLayer(marker);
                    }
                });
            }

            // Fetch gas stations from API
            function fetchGasStations(lat, lon) {
                fetch(`/gas-station/FindGas?latitude=${lat}&longitude=${lon}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Lỗi khi lấy dữ liệu từ API");
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (!Array.isArray(data)) {
                            console.error("Dữ liệu API không hợp lệ:", data);
                            return;
                        }
                        
                        // Add gas stations to map
                        data.forEach(location => {
                            addGasStationMarker(location);
                        });
                    })
                    .catch(error => {
                        console.error("Lỗi khi lấy dữ liệu:", error);
                        
                        // Load hardcoded data if API fails
                        loadHardcodedGasStations();
                    });
            }

            // Load hardcoded gas station data if API fails
            function loadHardcodedGasStations() {
                var locations = [
                    @foreach ($gasStations as $station)
                    {
                        id: {{ $station->id }},
                        name: "{{ addslashes($station->name) }}",
                        address: "{{ addslashes($station->address) }}",
                        phone: "{{ $station->phone }}",
                        openHours: "{{ $station->open_hours ?? '06:00 - 22:00' }}",
                        image: "{{ asset('storage/' . $station->image) }}",
                        latitude: {{ $station->latitude }},
                        longitude: {{ $station->longitude }},
                        rating: {{ $station->rating ?? 0 }},
                        reviews: []
                    }@if (!$loop->last),@endif
                    @endforeach
                ];
                
                locations.forEach(location => {
                    addGasStationMarker(location);
                });
            }

            // Add gas station marker to map
            function addGasStationMarker(location) {
                var lat = parseFloat(location.latitude);
                var lon = parseFloat(location.longitude);
                
                if (isNaN(lat) || isNaN(lon)) return;
                
                var marker = L.marker([lat, lon], {
                    icon: icon,
                    type: 'gas_station'
                }).addTo(map);
                
                // Store in markers array for filtering
                allMarkers.push(marker);
                
                // Create popup content
                var popupContent = `
                    <div class="popup-container" data-location-id="${location.id}">
                        <h3 class="popup-title">${location.name}</h3>
                        <p class="popup-rating">Đánh giá: ${getStarRating(location.rating)} (${location.rating || '0'}/5)</p>
                        <p class="popup-hours">⏰ Giờ mở cửa: <b>${location.openHours || '06:00 - 22:00'}</b></p>
                        ${location.distance ? `<p>📏 Cách bạn: <b>${location.distance} km</b></p>` : ''}
                    </div>
                `;
                
                marker.bindPopup(popupContent);
                
                marker.on("click", function() {
                    // Generate detailed info panel content
                    var infoContent = `
                        <div data-location-id="${location.id}">
                            <img src="${location.image || 'https://placehold.co/600x200?text=Gas+Station'}" alt="${location.name}">
                            <h3>${location.name}</h3>
                            <p><strong>Đánh giá:</strong> ${getStarRating(location.rating)} (${location.rating || '0'}/5)</p>

                            <div id="tab-content">
                                <!-- Thông tin tổng quan -->
                                <div class="tab-panel active" id="overview">
                                    <p><strong>📍 Địa chỉ:</strong> ${location.address}</p>
                                    <p><strong>⏰ Giờ hoạt động:</strong> ${location.openHours || '06:00 - 22:00'}</p>
                                    <p><strong>📞 Điện thoại:</strong> ${location.phone || 'Chưa cập nhật'}</p>
                                    ${location.distance ? `<p><strong>📏 Khoảng cách:</strong> ${location.distance} km</p>` : ''}
                                </div>
                                
                                <button class="directions-btn" onclick="showRoute(${userLat}, ${userLon}, ${lat}, ${lon})">
                                    <i class="fas fa-route"></i> Chỉ đường đến đây
                                </button>
                                
                                <hr>

                                <!-- Bài Đánh Giá -->
                                <div id="reviews">
                                    <h3><i class="fas fa-comments me-2"></i>Đánh Giá</h3>
                                    <div id="review-list">
                                        ${location.reviews && location.reviews.length > 0 
                                            ? location.reviews.map(review => `
                                                <div class="review-item">
                                                    <p><strong>${review.name}</strong> - ${getStarRating(review.rating)}</p>
                                                    <p>💬 ${review.comment}</p>
                                                </div>`).join('')
                                            : "<p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>"
                                        }
                                    </div>

                                    <h3><i class="fas fa-pen me-2"></i>Thêm Đánh Giá</h3>
                                    <form id="review-form" onsubmit="submitReview(event, ${location.id})">
                                        <input type="text" id="review-name" placeholder="Tên của bạn" required>
                                        <select id="review-rating">
                                            <option value="5">⭐⭐⭐⭐⭐</option>
                                            <option value="4">⭐⭐⭐⭐</option>
                                            <option value="3">⭐⭐⭐</option>
                                            <option value="2">⭐⭐</option>
                                            <option value="1">⭐</option>
                                        </select>
                                        <textarea id="review-comment" placeholder="Nhận xét của bạn" required></textarea>
                                        <button type="submit"><i class="fas fa-paper-plane me-2"></i>Gửi đánh giá</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    document.getElementById("info-content").innerHTML = infoContent;
                    showInfoPanel();
                });
            }
            
            // Submit review
            window.submitReview = function(event, locationId) {
                event.preventDefault();
                
                var name = document.getElementById("review-name").value;
                var rating = document.getElementById("review-rating").value;
                var comment = document.getElementById("review-comment").value;
                
                // Here you would normally send this to your backend
                alert(`Cảm ơn ${name} đã đánh giá! Đánh giá của bạn sẽ được hiển thị sau khi kiểm duyệt.`);
                
                // Clear form
                document.getElementById("review-form").reset();
            };

            // Show route between two points
            window.showRoute = function(userLat, userLon, destLat, destLon) {
                // Remove existing route if any
                if (currentRoute) {
                    map.removeControl(currentRoute);
                }
                
                // Create new route
                currentRoute = L.Routing.control({
                    waypoints: [
                        L.latLng(userLat, userLon),
                        L.latLng(destLat, destLon)
                    ],
                    routeWhileDragging: true,
                    lineOptions: {
                        styles: [
                            {color: '#3b82f6', opacity: 0.8, weight: 6}
                        ]
                    },
                    createMarker: function() { return null; }
                }).addTo(map);
                
                hideInfoPanel();
            };

            // Get directions with text input
            window.getDirections = function(startLat, startLon, startName, endName) {
                if (currentRoute) {
                    map.removeControl(currentRoute);
                }
                
                if (startLat && startLon) {
                    // Start from coordinates
                    geocoder.geocode(endName, function(results) {
                        if (results.length > 0) {
                            var end = results[0].center;
                            
                            currentRoute = L.Routing.control({
                                waypoints: [
                                    L.latLng(startLat, startLon),
                                    L.latLng(end.lat, end.lng)
                                ],
                                routeWhileDragging: true,
                                lineOptions: {
                                    styles: [{color: '#3b82f6', opacity: 0.8, weight: 6}]
                                },
                                createMarker: function() { return null; }
                            }).addTo(map);
                        }
                    });
                } else {
                    // Geocode both start and end
                    geocoder.geocode(startName, function(startResults) {
                        if (startResults.length > 0) {
                            var start = startResults[0].center;
                            
                            geocoder.geocode(endName, function(endResults) {
                                if (endResults.length > 0) {
                                    var end = endResults[0].center;
                                    
                                    currentRoute = L.Routing.control({
                                        waypoints: [
                                            L.latLng(start.lat, start.lng),
                                            L.latLng(end.lat, end.lng)
                                        ],
                                        routeWhileDragging: true,
                                        lineOptions: {
                                            styles: [{color: '#3b82f6', opacity: 0.8, weight: 6}]
                                        },
                                        createMarker: function() { return null; }
                                    }).addTo(map);
                                }
                            });
                        }
                    });
                }
            };
        });
    </script>
</body>

</html>