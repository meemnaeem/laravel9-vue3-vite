<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use App\Http\Controllers\Controller;
use App\Services\RestoService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuService $service, RestoService $restoService)
    {
        $restoId = 1;
        $menus = $service->getMenuWithCategories($restoId);
        $restos =  $restoService->userRestoAndTables();

        return view('home', compact('menus', 'restoId', 'restos'));
    }
}
