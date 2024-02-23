<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;

class ChangeRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response client()
     */
    public function index(Room $room)
    {
        return "";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room, Request $request)
    {
        $splitUrl = explode('/', $request->url());
        $client = DB::update(
            'UPDATE clients SET room_id = ? WHERE id = ?',
            [$room->id, (int)$splitUrl[7]]
        );
        return  response()->json([
            'id' => (int)$splitUrl[7],
            'message' => 'Updated'
        ]);
        // return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
