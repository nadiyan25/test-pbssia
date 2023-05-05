<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Karyawan extends Controller
{
    protected $client;
    //buat constructor
    function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }
    function index()
    {
        // echo "Ini halaman Home";
       // echo env("API_URL");

       //buat URL
       $url = env("API_URL"). "view";
       // buat url service "GET" dari server
       $request = $this->client->get($url);
       // tampilkan hasil
       $response = $request->getBody();

        // foreach(json_decode($response)->Karyawan as $data)
        // {
        //     // echo $data->nama_karyawan."<br>";
        // }
        // // echo $response;

        $data["result"] = json_decode($response)->Karyawan;

        // panggil view "vw_karyawan"
        return view ("vw_karyawan",$data);
    }
}
