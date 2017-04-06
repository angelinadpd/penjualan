<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;

class ItemCRUD2Controller extends Controller
{
    public function index(Request $request)
    {
        $items = Item::orderBy('id','DESC')->paginate(5);
        return view('ItemCRUD2.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('ItemCRUD2.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        Item::create($request->all());

        return redirect()->route('itemCRUD2.index')
                        ->with('success','Item created successfully');
    }

    public function show($id)
    {
        $item = Item::find($id);
        return view('ItemCRUD2.show',compact('item'));
    }

    public function edit($id)
    {
        $item = Item::find($id);
        return view('ItemCRUD2.edit',compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        Item::find($id)->update($request->all());

        return redirect()->route('itemCRUD2.index')
                        ->with('success','Item updated successfully');
    }

    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect()->route('itemCRUD2.index')
                        ->with('success','Item deleted successfully');
    }
}
