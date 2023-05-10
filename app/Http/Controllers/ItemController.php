<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //dd(request()->keyword);
        $items = Item::
        when(request()->has("keyword"),function($query){
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
        return view("inventory.index",compact("items"));

    //Model Methods
        //$items = Item::all();
        //return collect($items->first())->values();
        //dd($items);
        //dd($items->contains("name","Nicholaus Hane"));
        //dd($items->filter(fn($item) => $item->price > 900));
        //dd($items->sum("price")); //eloquent/collection
        // $newItems = $items->map(function($item){
        //     $item->price += 50;
        //     $item->stock -= 10;
        //     return $item;
        // });
        //dd($newItems);
        //return $items->sum("price");

    //Builders
        //$items = Item::where("id",">",5)->where("price",">",7000)->get();
        // $items = Item::where("price",">",9000)
        //         ->orWhere("stock","<",10)
        //         ->get();
        //$items = Item::whereIn("id",[5,10,15])->get();
        // $items = Item::whereBetween("price",[7000,9000])->get();
        // return $items;

    //Query Builder
        //$items = DB::table('items')->where("id","<",5)->get();
        // $items  = Item::when(false,function($query){
        //     $query->where("id",5);
        // })->get();
        // $items = Item::limit(5)->offset(20)->orderBy("id","desc")->get();
        //$items = Item::latest("id")->get();
        // get => collection   //first => model   //firstOrFail
        //$items = Item::where("id",">",100)->firstOrFail();
        //$items = Item::find(10);
        // $items = Item::paginate(7);
        // dd($items);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        //validation rule in StoreItemRequest
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();
        return redirect()->route('item.index')->with("status","New Item Created"); //session message with()
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('inventory.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('inventory.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();
        return redirect()->route('item.index')->with("status","Item updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->with("status","Item deleted successfully");
    }
}
