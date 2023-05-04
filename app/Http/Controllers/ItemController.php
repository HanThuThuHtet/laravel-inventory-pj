<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(){
        return view('inventory.create');
    }
    public function index(){
        // $items = new Item();
        // $all = $items->all();
        // return $all;
        // dd($all);
        return view("inventory.index",[
            "items" => Item::all()
        ]);
    }
    public function store(Request $request){ //Request(Dependency injection) => get/post ....
        //dd($request);
        // if($request->has("price")){
        //     dd($request->price);
        // }else{
        //     dd("sorry");
        // }

    //Eloquent ORM
        $item = new Item(); //Item => moldel
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save(); //insert into ...
        //dd($item); //model
        //return $item;


    //Static Method => mass data/mass assignment
        // $item = Item::create([
        //     "name" => $request->name,
        //     "price" => $request->price,
        //     "stock" => $request->stock
        // ]);

    //$request->all()
        //$item = Item::create($request->all()); //include token
        //dd($request->all());


    //insert => query builder // return only boolean
        // $item = Item::insert([
        //         "name" => $request->name,
        //         "price" => $request->price,
        //         "stock" => $request->stock
        //     ]);

        return redirect()->route("item.index");
        //return $item;
        //return  $request;
    }

}
