<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function  __construct()
    {
        $this->middleware('permission:menus.create')->only(['create', 'store']);
        $this->middleware('permission:menus.index')->only('index');
        $this->middleware('permission:menus.edit')->only(['edit', 'update']);
        $this->middleware('permission:menus.show')->only('show');
        $this->middleware('permission:menus.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate();
        return view('menus.index', compact(['menus']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::pluck('menu', 'id')->toArray();
        return view('menus.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        throw new \App\Exceptions\CustomException('Something Went Wrong.');

        Menu::create($request->all());

       return redirect()->route('menus.index')
            ->with('info','Menu Creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $menus = Menu::where('id','!=',$menu->id)->pluck('menu', 'id')->toArray();
        return view('menus.edit', compact('menu','menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all());
        return redirect()->route('menus.index',$menu->id)
            ->with('info','Menú Guardado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return back()->with('info', 'Eliminado Correctamente');
    }
}
