<html>
	<head>
		<title>Page Title</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

		<!-- Import Leaflet CSS -->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
		<!-- Import Leaflet JS -->
		<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
	</head>
	<body>
		<div id="left">Left content</div>
		<div id="map"></div>
		<div id="right">Right content</div>

		<script>
            // Thiết lập thông số cho bản đồ
            var mapOptions = {
                center: [10.026667, 105.783333],
                zoom: 15
            };
            // Khai báo đối tượng bản đồ
            var map = new L.map('map', mapOptions);
            // Khai báo lớp bản đồ
            var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
            // Thêm mới lớp bản đồ vào bản đồ
            map.addLayer(layer);
    
            // Tạo lớp đánh dấu
            var marker = L.marker([ 10.0299890, 105.7707527]);
    
            // Tạo icon đánh dấu mới với logo Đại học Cần Thơ
            var icon = L.icon({
                iconUrl: 'https://upload.wikimedia.org/wikipedia/vi/6/6c/Logo_Dai_hoc_Can_Tho.svg', // Đường dẫn đến logo Đại học Cần Thơ
                iconSize: [40, 40], // Kích thước của logo
                iconAnchor: [20, 40], // Vị trí của logo
                popupAnchor: [1, -34] // Vị trí của popup
            });
    
            // Thay thế icon đánh dấu mặc định
            marker.setIcon(icon);
    
            // Thêm lớp đánh dấu vào bản đồ
            marker.addTo(map);

            // // Cài đặt thuộc tính cho lớp đánh dấu
            // // marker.bindPopup("Đại học Cần Thơ");
            // marker.bindPopup(`
            // <h2> Khu II Đại học Cần Thơ</h2>
            // <p>Địa chỉ: Khu II, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, thành phố Cần Thơ</p>
            // <p>Mô tả: Đại học Cần Thơ là một trường đại học công lập tại thành phố Cần Thơ, Việt Nam. Trường được thành lập vào năm 1966 và hiện là một trong những trường đại học lớn nhất tại khu vực Đồng bằng sông Cửu Long.</p>
            // <img src="logo.png" width="300" height="200">
            // `);

            // Mảng chứa vị trí của 4 khu
            var locations = [
                { name: "Khu I - Đường 30/4", coords: [10.029338, 105.768499] },
                { name: "Khu II - Đường 3/2", coords: [10.038072, 105.769839] },
                { name: "Khu III - Đường Lý Tự Trọng", coords: [10.032110, 105.778589] },
                { name: "Khu Hòa An - Hậu Giang", coords: [9.985250, 105.642550] }
            ];

            // Vòng lặp để thêm các marker tương ứng
            locations.forEach(function(location) {
                var marker = L.marker(location.coords).addTo(map);
                marker.bindPopup(location.name); // Hiển thị tên khu khi click vào marker
            });

            // Kiểm tra trình duyệt có hỗ trợ Geolocation API không
            // if (navigator.geolocation) {
            //     navigator.geolocation.getCurrentPosition(function(position) {
            //         var latitude = position.coords.latitude;
            //         var longitude = position.coords.longitude;

            //         // Thêm marker vào vị trí hiện tại
            //         var userMarker = L.marker([latitude, longitude]).addTo(map);

            //         // Di chuyển bản đồ tới vị trí hiện tại
            //         map.setView([latitude, longitude], 15);

            //         // Popup thông báo vị trí
            //         userMarker.bindPopup("You are here: " + latitude + ", " + longitude).openPopup();
            //     }, function(error) {
            //         console.error("Geolocation error: " + error.message);
            //     });
            // } else {
            //     alert("Trình duyệt của bạn không hỗ trợ Geolocation API.");
            // }
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                maxZoom: 19,
                attribution: "© OpenStreetMap contributors"
            }).addTo(map);

            // Tích hợp Leaflet Control Geocoder
            var geocoder = L.Control.Geocoder.nominatim(); // Sử dụng dịch vụ Nominatim của OpenStreetMap
            var control = L.Control.geocoder({
                geocoder: geocoder,
                defaultMarkGeocode: true // Tự động đánh dấu vị trí trên bản đồ
            }).addTo(map);

            // Lắng nghe sự kiện khi tìm kiếm
            control.on("markgeocode", function (e) {
                var center = e.geocode.center; // Tọa độ được trả về
                L.marker(center).addTo(map) // Thêm marker tại vị trí
                    .bindPopup(e.geocode.name) // Thông báo tên địa điểm
                    .openPopup();
                map.setView(center, 15); // Di chuyển bản đồ tới vị trí
            });

    </script>
</body>
</html>

        

        