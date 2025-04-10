@extends('admin.layouts.main')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Thư viện Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Thư viện Marker Clustering -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>

    <!-- Thư viện Heatmap -->
    <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Statistics Section -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thống kê Cây Xăng Theo Quận/Huyện</h4>
                    <canvas id="districtBarChart"></canvas> <!-- Add Canvas for Chart -->
                </div>
            </div>
            <!-- End Statistics Section -->

            <div id="map" style="width: 100%; height: 500px;"></div>

            <script>
                var map = L.map('map').setView([10.045162, 105.746853], 13);

                // Thêm lớp bản đồ OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                // Tạo một nhóm Marker Clustering
                var markers = L.markerClusterGroup();

                // Khởi tạo mảng dữ liệu cho Heatmap
                var heatmapData = [];

                @foreach ($gasStations as $station)
                    var marker = L.marker([{{ $station->latitude }}, {{ $station->longitude }}], {
                        icon: L.icon({
                            iconUrl: 'https://cdn-icons-png.flaticon.com/512/6686/6686706.png',
                            iconSize: [32, 32],
                            iconAnchor: [16, 32],
                            popupAnchor: [0, -32]
                        })
                    }).bindPopup('<b>{{ $station->name }}</b><br>{{ $station->address }}');
                    markers.addLayer(marker);
                    heatmapData.push([{{ $station->latitude }}, {{ $station->longitude }}, 1]);
                @endforeach

                // Thêm nhóm Marker Clustering vào bản đồ
                map.addLayer(markers);

                // Tạo heatmap
                var heatLayer = L.heatLayer(heatmapData, {
                    radius: 50,
                    blur: 20,
                    maxZoom: 12,
                    max: 30,
                    gradient: {
                        0.2: 'blue',
                        0.4: 'lime',
                        0.6: 'yellow',
                        0.8: 'orange',
                        1.0: 'red'
                    }
                }).addTo(map);

                // Hiển thị số lượng cây xăng khi click vào các vùng (Quận/Huyện)
                var districtHeatData = {!! json_encode($districtHeatData) !!};

                // Hiển thị các vòng tròn cho mỗi quận
                districtHeatData.forEach(function(district) {
                    var fillColor;
                    if (district.count <= 5) {
                        fillColor = 'green';
                    } else if (district.count <= 10) {
                        fillColor = 'yellow';
                    } else {
                        fillColor = 'red';
                    }

                    L.circleMarker([district.lat, district.lng], {
                        color: 'black',
                        fillColor: fillColor,
                        fillOpacity: 0.6,
                        radius: 15
                    }).addTo(map).bindPopup('<b>' + district.name + '</b><br>Số cây xăng: ' + district.count);
                });

                // Thêm Legend cho bản đồ
                var legend = L.control({
                    position: 'bottomright'
                });
                legend.onAdd = function(map) {
                    var div = L.DomUtil.create('div', 'info legend'),
                        grades = [1, 5, 10, 15, 20],
                        colors = ['green', 'yellow', 'orange', 'red'];

                    div.innerHTML += "<strong>Mật độ cây xăng</strong><br>";
                    for (var i = 0; i < grades.length; i++) {
                        div.innerHTML +=
                            '<i style="background:' + colors[i] +
                            '; width: 20px; height: 20px; display: inline-block; margin-right: 5px;"></i> ' +
                            grades[i] + ' cây xăng<br>';
                    }
                    return div;
                };
                legend.addTo(map);

                // Biểu đồ thống kê số lượng cây xăng theo quận
                var ctx = document.getElementById('districtBarChart').getContext('2d');
                var districtBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($districtStatistics->keys()) !!},
                        datasets: [{
                            label: 'Số lượng cây xăng',
                            data: {!! json_encode($districtStatistics->values()) !!},
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

            <style>
                .legend {
                    background: white;
                    padding: 10px;
                    border-radius: 5px;
                    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
                    font-size: 14px;
                    line-height: 18px;
                }
            </style>

        </div>
    </div>
@endsection
