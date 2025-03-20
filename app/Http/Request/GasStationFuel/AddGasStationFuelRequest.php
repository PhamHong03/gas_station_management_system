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
            'GasStationId' => 'required|integer',
            'FuelTypeId' => 'required|integer',
        ];
    }
    public function messages(){
        return [
            'GasStationId.required' => 'Gas Station ID is required',
            'GasStationId.integer' => 'Gas Station ID must be an integer',
            'FuelTypeId.required' => 'Fuel ID is required',
            'FuelTypeId.integer' => 'Fuel ID must be an integer',
            ];
    }

}
