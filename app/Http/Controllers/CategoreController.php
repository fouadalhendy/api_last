<?php

namespace App\Http\Controllers;

use App\Models\Categore;
use Illuminate\Http\Request;

class CategoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny',Categore::class);
        $categore=categore::all();
        return response()->json([$categore]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',Categore::class);
        $data=$request->validate([
            'titel'=>'required|string',
            'img'=>'required|image',
            'content'=>'required|string'
        ]);
        if ($request->hasFile("img")) {
            $img = $request->img;
            $imgname = time() . '.' . $img->getClientOriginalExtension();;
            $img->move(public_path('categoreimges'), $imgname);
        }
        $categore=new Categore;
        $categore->titel=$data['titel'];
        $categore->content=$data['content'];
        $categore->img=$imgname;
        $categore->save();
        return response()->json([
            "massge"=>"insert new categore"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categore $categore)
    {
        $this->authorize('view',Categore::class);
        return response()->json([
            $categore
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categore $categore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categore $categore)
    {
        $this->authorize('update',Categore::class);
        // public function name(model $model){
        //     return $user->is_admin
        // }

        $data=$request->validate([
            'titel'=>'required|string',
            'img'=>'image',
            'content'=>'required|string'
        ]);
        if ($request->hasFile("img")) {
            $img = $request->img;
            $imgname = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('categoreimges'), $imgname);
            $categore->img=$imgname;
        }

        $categore->titel=$data['titel'];
        $categore->content=$data['content'];
        $categore->save();
        return response()->json([
            "massge"=>"ubdate categore"
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categore $categore)
    {
        $this->authorize('delete',Categore::class);

        $categore->delete();
        return response()->json([
            "massge"=>"delete categore"
        ],200);
    }
}
