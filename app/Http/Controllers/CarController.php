<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    public function getCars () {

        $cars = Car::with('booking')->get();        
        return response()->json($cars, 206);       
    }
       
        
    public function addCar(CarRequest $request) {
        
        $request->validated();

        $car =Car::create([
            
            "brand"=>$request->brand,
            "model"=>$request->model,
            "lincensePlate"=>$request->lincensePlate,
            "year"=>$request->year,
            "dailyPrice"=>$request->dailyPrice  
        ]);

        return response()->json($car, 206);
    }

    public function modCar(CarRequest $request, $id) {
        $request->validated();
        $car = Car::find($id);
        $car->brand=$request["brand"];
        $car->model=$request["model"];
        $car->lincensePlate=$request["lincensePlate"];
        $car->year=$request["year"];
        $car->dailyPrice=$request["dailyPrice"];
       
        $car->update();
       
        return response()->json($car, 206);
    }

    public function delCar($id) {
        $car = Car::find($id);
        $car->delete();
        return response()->json($car, 206);
    }
}
