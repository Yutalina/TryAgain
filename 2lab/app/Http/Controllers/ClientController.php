<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
	
    public function Read(){
        return response()->json(Client::all(), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
	
    public function Add(Request $request){
        Client::create(['name' => $request->name]);
        return response()->json(['result' => 'Клиент добавлен'], 201, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
	
    public function Update($id, $name){
        $client = Client::find($id);
        if(!$client && $client == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $client->name = $name;
        $client->save();
        return response()->json(['result' => 'Запись обновлена'], 200);
    }
	
    public function Delete($id){
        $client = Client::find($id);
        if(!$client && $client == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $client->delete();
        return response()->json(['result' => 'Запись удалена'], 200);
    }
}
