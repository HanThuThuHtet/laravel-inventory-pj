<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('cat')->only(["store","delete","index","show"]); //except()
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Middleware
        // if(!request()->has('token')){
        //     return response()->json(["message" => "Unauthorized Access.Api Token required."],401);
        // }elseif(request()->token != "htth"){
        //     return response()->json(["message" => "Invalid Api Token."],401);
        // }



        $items = Item::when(request()->has("keyword"),function($query){
            $keyword = request()->keyword;
            $query->where("name","like","%".$keyword."%");
            $query->orWhere("price","like","%".$keyword."%");
            $query->orWhere("stock","like","%".$keyword."%");
        })
        ->when(request()->has("name"),function($query){
            $sortType = request()->name ?? 'asc';
            $query->orderBy("name",$sortType);
        })
        ->paginate(7)->withQueryString();
        // return response()->json($items,200);

        //ItemResource
        return ItemResource::collection($items);

        // return response()->json([
        //     "response" => "response"
        // ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        // $request->validate([
        //     "name" => "required",
        //     "price" => "required",
        //     "stock" => "required"
        // ]);
        //Header => Accept / Application/josn


        $validator = Validator::make($request->all(),
            [
                "name" => "required",
                "price" => "required",
                "stock" => "required"
            ]);
            if($validator->fails()){
                return response()->json($validator->messages(),422);
            }

        $item = Item::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock
        ]);
        //return response()->json($item);
        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        if(is_null($item)){
            return response()->json(["message"=>"Not Found"],404);
        }
        //return response()->json($item);

        //Api resouce
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required",
            "price" => "required",
            "stock" => "required"
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(),422);
        }
        $item = Item::find($id);
        if(is_null($item)){
            return response()->json(["message" => "not found"],404);
        }
        $item->update([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock
        ]);
        //return response()->json($item);
        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        if(is_null($item)){
            return response()->json(["message"=>"Not found"],404);
        }
        $item->delete();
        return response()->json(["message"=>"item deleted"],204);
    }
}
