<?php

namespace iEats\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
     /**
     * Show the Store listings (first level page of catalog)
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('catalog.stores');
    }
}
