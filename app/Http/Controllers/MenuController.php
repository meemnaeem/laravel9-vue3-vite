<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Rules\RestoCategoryValidate;
use Illuminate\Http\Request;
use App\Services\MenuService;

class MenuController extends Controller
{
    public function index($id)
    {
        $restoId = $id;
        $restoService = new MenuService;
        $menus = $restoService->getMenuWithCategories($restoId);

        if (!$menus) {
            abort(400, 'Wrong resto');
        }

        return view('menus.menu-index')
            ->with('restoId', $restoId)
            ->with('menus', $menus);
    }

    public function addMenuItem(Request $request)
    {
        $postData = $this->validate($request, [
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'restoId' => 'required|numeric',
            'description' => 'required|min:3',
            'category' => ['required', new RestoCategoryValidate(request('restoId'))],
        ]);

        $conditions = [
            'resto_id' => $postData['restoId'],
            'name' => $postData['category'],
        ];

        $category = Category::where($conditions)
            ->first();

        $menu = $category->menus()->create([
            'name' => $postData['name'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            'resto_id' => $postData['restoId'],
            'category_id' => $category->id,
        ]);
        // $menu->save();
        return response()->json($menu, 201);
    }

    public function getRestoMenu(Request $request)
    {
        $postData = $this->validate($request, [
            'restoId' => 'required|exists:restos,id',
        ]);

        $menuItems = Menu::where('resto_id', $postData['restoId'])
            ->orderBy('name')
            ->orderBy('category_id')
            ->get();

        return response()->json($menuItems, 200);
    }
}
