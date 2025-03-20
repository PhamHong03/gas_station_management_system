<?php
namespace App\Http\Services\GasStation;

use App\Models\GasStation;
use Illuminate\Support\Str;
use App\Models\GasStationFuel;
use App\Http\Request\GasStation\AddGasStationRequest;

class GasStationService
{
    public function addGasStation(AddGasStationRequest $request)
{
    $gasStation = new GasStation();
    $gasStation->name = $request->name;
    $gasStation->address = $request->address;
    $gasStation->phone = $request->phone;
    $gasStation->longitude = $request->longitude;
    $gasStation->latitude = $request->latitude;
    $gasStation->operation_time = $request->operation_time;
    $gasStation->CompanyId = $request->CompanyId;
    $gasStation->WardId = $request->WardId;
    //Hướng dẫn xữ lý ảnh upload
    // Kiểm tra xem có file ảnh được tải lên không
    if ($request->hasFile('image')) {
        // Kiểm tra định dạng file
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tạo tên file chuẩn hóa
        $datePrefix = now()->format('Ymd');
        $cleanName = Str::slug($request->name); // Loại bỏ ký tự đặc biệt
        $file = $request->file('image'); // Lấy instance của UploadedFile
        $filename = "{$datePrefix}_{$cleanName}_{$request->CompanyId}_{$request->WardId}.{$file->extension()}";

        // Lưu file vào thư mục storage/app/public/gas_station
        $path = $file->storeAs('gas_station', $filename, 'public');

        // Gán đường dẫn vào database
        $gasStation->image = $path;
    }

    if ($gasStation->save()) {
        return redirect()->back()->with('success', 'Thêm cây xăng thành công');
    }

    return redirect()->back()->with('error', 'Thêm cây xăng thất bại');
}
    public function update(AddGasStationRequest $request, $id){
        $gasStation = GasStation::find($id);
        $gasStation->name = $request->name;
        $gasStation->address = $request->address;
        $gasStation->phone = $request->phone;
        $gasStation->longitude = $request->longitude;
        $gasStation->latitude = $request->latitude;
        $gasStation->operation_time = $request->operation_time;
        $gasStation->CompanyId = $request->CompanyId;
        $gasStation->WardId = $request->WardId;
        //Hướng dẫn xữ lý ảnh upload
        // Kiểm tra xem có file ảnh được tải lên không
        if ($request->hasFile('image')) {
            // Kiểm tra định dạng file
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Tạo tên file chuẩn hóa
            $datePrefix = now()->format('Ymd');
            $cleanName = Str::slug($request->name); // Loại bỏ ký tự đặc biệt
            $file = $request->file('image'); // Lấy instance của UploadedFile
            $filename = "{$datePrefix}_{$cleanName}_{$request->CompanyId}_{$request->WardId}.{$file->extension()}";

            // Lưu file vào thư mục storage/app/public/gas_station
            $path = $file->storeAs('gas_station', $filename, 'public');

            // Gán đường dẫn vào database
            $gasStation->image = $path;
        }
        if($gasStation->save()) return true;
        return redirect()->back()->with('error', 'Cập nhật cây xăng thất bại');
    }
    public function delete($id){
        $gasStation = GasStation::find($id);
        if($gasStation->delete()) return true;
        return redirect()->back()->with('error', 'Xóa cây xăng thất bại');
    }
}
