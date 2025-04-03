<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GasStation;

class MainController extends Controller
{
    public function index()
    {
        $gasStations = GasStation::with('ward.district')->get();  // Load dữ liệu liên kết

        // Nhóm số lượng cây xăng theo quận/huyện
        $districtStatistics = $gasStations->groupBy(function ($station) {
            return optional($station->ward)->DistrictId;  // Dùng `optional()` tránh lỗi
        })->map->count();

        // Tạo heatmap data cho từng quận
        // Lấy tất cả cây xăng trong quận mà không tính trung tâm
        $districtHeatData = [];
        foreach ($districtStatistics as $districtId => $count) {
            if ($districtId) {
                $stations = GasStation::whereHas('ward', function ($query) use ($districtId) {
                    $query->where('DistrictId', $districtId);
                })->get();

                // Lưu thông tin từng cây xăng vào mảng heatmap
                foreach ($stations as $station) {
                    $districtHeatData[] = [
                        'lat' => $station->latitude,
                        'lng' => $station->longitude,
                        'count' => 1,  // Mỗi cây xăng đóng góp 1 vào heatmap
                        'name' => $station->name,
                    ];
                }
            }
        }

        return view('admin.index', compact('gasStations', 'districtStatistics', 'districtHeatData'));
    }
}