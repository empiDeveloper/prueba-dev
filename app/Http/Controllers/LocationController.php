<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function getLocation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'query' => ['required', 'min:3'],
                'api' => 'required'
            ]);
            if($validator->fails()) return response($validator->errors(), 400);

            $query = $request->query('query');
            $apiKey = $request->api;

            $data = Http::get("http://api.openweathermap.org/geo/1.0/direct?q=$query&limit=10&appid=$apiKey")->json();

            if (count($data) > 0) {
                $this->postHistory(collect($data)->first());
            }

            return response($data, 200);
        } catch(\Exception $e) {
            return response($e);
        }
    }

    public function getHistory()
    {
        try {
            $data = History::orderBy('id', 'DESC')->get();
            return response($data, 200);
        } catch(\Exception $e) {
            return response($e);
        }
    }

    public function postHistory($element)
    {
        try {
            return DB::transaction(function() use($element){
                History::insert([
                    'city' => $element['name'] ?? null,
                    'lat' => $element['lat'] ?? null,
                    'lon' => $element['lon'] ?? null,
                    'country' => $element['country'] ?? null,
                    'state' => $element['state'] ?? null,
                ]);
                return true;
            },2);
        } catch(\Exception $e){
            throw $e;
        }
    }
}
