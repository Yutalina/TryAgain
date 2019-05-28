<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function Read(){
        return response()->json(Service::all(), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
	
    public function Add(Request $request){
        Service::create(['name' => $request->name]);
        return response()->json(['result' => 'Услуга добавлена'], 201);
    }
	
    public function Update($id, Request $request){
        $service = Service::find($id);
        if(!$service && $service == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $service->name = $request->name;
        $service->save();
        return response()->json(['result' => 'Запись обновлена'], 200);
    }
	
    public function Delete($id){
        $service = Service::find($id);
        if(!$service && $service == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $service->delete();
        return response()->json(['result' => 'Запись удалена'], 200);
    }
}
