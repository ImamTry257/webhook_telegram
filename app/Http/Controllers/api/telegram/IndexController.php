<?php

namespace App\Http\Controllers\api\telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $TOKEN = env('TOKEN_BOOT');
        $api_url = "https://api.telegram.org/bot$TOKEN";
        $update = json_decode(file_get_contents("php://input"), TRUE);
        // $chatID = $update["message"]["chat"]["id"]; 
        $chatID = env('CHAT_ID'); # chatID didapatkan dari set domain webhook, maka ada param chat id dari return api telegram
        $message = $request->message;

        Http::post($api_url . "/sendmessage?chat_id=" . $chatID . "&text=" . $message . ".&parse_mode=HTML");

        return response()->json([
            'status'    => true,
            'message'   => 'OK',
            'code'      => 200
        ]);
    }

    function set_webhook()
    {
        $TOKEN = "TOKEN BOT ANDA";
        $apiURL = "https://api.telegram.org/bot$TOKEN";
        $update = json_decode(file_get_contents("php://input"), TRUE);
        $chatID = $update["message"]["chat"]["id"];
        $message = $update["message"]["text"];

        if (strpos($message, "/start") === 0) {

            file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=Haloo, test webhooks bykarya.myd.id.&parse_mode=HTML");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
