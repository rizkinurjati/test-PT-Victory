<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Blade;
use Money\Money;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest()->paginate(5);
        return view('pages.item',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogs = Catalog::all();
        return view('pages.item-create',['catalogs' => $catalogs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'item_name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'images' => 'image|mimes:jpg,png,jpeg,gif,svg|file|max:1024',
            'catalogs_id' => 'required'
        ]);
        $items = Item::create([
            'item_name' => $request->item_name,
            'description' => $request->item_name,
            'price' => $request->price,
            'images' => $request->file('images')->store('images'),
            'catalogs_id' => $request->catalogs_id,
        ])->with($validated);

        if ($items) {
            return 
                redirect()
                ->route('item.index')
                ->with([
                'success' => 'New Item has been created successfully']);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $catalogs = Catalog::all();
        $item = Item::findOrFail($id);
        return view('pages.item-edit', compact('item'),['catalogs' => $catalogs]);
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
        $validated = $request->validate([
            'item_name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'images' => 'image|mimes:jpg,png,jpeg,gif,svg|file|max:1024',
            'catalogs_id' => 'required'
        ]);
        $items = Item::where('id',$id)->with($validated);
        $items->update([
            'item_name' => $request->item_name,
            'description' => $request->item_name,
            'price' => $request->price,
            'images' => $request->file('images')->store('images'),
            'catalogs_id' => $request->catalogs_id,
        ]);
        
        if ($items) {
            return 
                redirect()
                ->route('item.index')
                ->with([
                'success' => 'New Item has been created successfully']);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item-> delete();

        if ($item) {
            return redirect()
                ->route('item.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('item.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
