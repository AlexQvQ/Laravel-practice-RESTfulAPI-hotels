<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if($request->validate([
        //     'fio' => 'required|string|max:255',
        //     'email' => 'required|email',
        //     'phone' => 'required|string|max:12',
        //     'birth_date' => 'required|date',
        //     'room_id' => 'required|exists:rooms,id'
        // ])){
        //     return response()->json([
        //         'id' => $client->id,
        //         'message' => 'Updated'
        //     ]);
        // }
        $client = Client::create([
            $request->validate([
                'fio' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:12',
                'birth_date' => 'required|date',
                'room_id' => 'required|exists:rooms,id'
            ]),
            'fio' => request('fio'),
            'email' => request('email'),
            'phone' => request('phone'),
            'birth_date' => request('birth_date'),
            'room_id' => request('room_id')
        ]);


        return $client;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validate = $request->validate([
            'fio' => 'sometimes|string|max:255',
            'email' => 'sometimes|email',
            'phone' => 'sometimes|string|max:12',
            'birth_date' => 'sometimes|date',
            'room_id' => 'sometimes|exist:rooms.id'
        ]);
        $client->update($validate);
        return response()->json([
            'id' => $client->id,
            'message' => 'Updated'
        ]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json([
            'message' => 'deleted'
        ]);
    }
}
