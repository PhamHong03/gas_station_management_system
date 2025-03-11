<?php
namespace App\Http\Request\GasStationFuel;

use Illuminate\Foundation\Http\FormRequest;

class AddGasStationFuelRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'gas_station_id' => 'required|integer',
            'fuel_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'created_by' => 'required|integer',
            ];
    }
    public function messages(){
        return [
            'gas_station_id.required' => 'Gas Station ID is required',
            'gas_station_id.integer' => 'Gas Station ID must be an integer',
            'fuel_id.required' => 'Fuel ID is required',
            'fuel_id.integer' => 'Fuel ID must be an integer',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a numeric value',
            'quantity.required' => 'Quantity is required',
            'quantity.numeric' => 'Quantity must be a numeric value',
            'created_by.required' => 'Created By is required',
            'created_by.integer' => 'Created By must be an integer',
            ];
    }

}
