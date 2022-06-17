<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = Item::latest()->paginate(5);
        return view('pages.show',['items'=> $items]);
        
    }
}
