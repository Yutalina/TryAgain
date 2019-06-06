<?php

namespace App\Http\Controllers;

use GuzzleHttp;

class RequestsController extends Controller
{
    public function index(){
        $client = new GuzzleHttp\Client();
        $url = "http://5lab/public/requests";
        $response = $client->request("GET", $url);
        $json = $response->getBody();
        $result = json_decode($json);
        return view('requests.index', ['result' => $result]);
    }

    public function create($clientId, $serviceId){
        $http = new GuzzleHttp\Client();
        $url = "http://5lab/public/requests";
        $myBody['client_id'] = $clientId;
        $myBody['service_id'] = $serviceId;
        $request = $http->post($url,  ['body'=>$myBody]);
        return $request->send();
    }

    public function update($id, $clientId, $serviceId){
        $http = new GuzzleHttp\Client();
        $url = "http://5lab/public/requests/$id";
        $myBody['client_id'] = $clientId;
        $myBody['service_id'] = $serviceId;
        $request = $http->put($url,  ['body'=>$myBody]);
        return $request->send();
    }

    public function delete($id){
        $http = new GuzzleHttp\Client();
        $url = "http://5lab/public/requests/$id";
        $request = $http->delete($url);
        return $request->send();
    }
}