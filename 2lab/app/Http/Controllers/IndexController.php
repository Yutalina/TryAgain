<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class IndexController extends Controller
{
    public function Read(){
        return response()->json(Application::all(), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
	
    public function Add(){
        Application::create(['id_client' => request()->client_id, 'id_service' => request()->service_id]);
        return response()->json(['result' => 'Заявка добавлена'], 201);
    }
	
    public function Update($id){
        $application = Application::find($id);
        if(!$application && $application == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $application->client_id = request()->client_id;
        $application->service_id = request()->service_id;
        $application->save();
        return response()->json(['result' => 'Запись обновлена'], 200);
    }
	
    public function Delete($id){
        $application = Application::find($id);
        if(!$application && $application == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $application->delete();
        return response()->json(['result' => 'Запись удалена'], 200);
    }
}
