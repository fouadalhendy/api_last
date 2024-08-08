<?php

namespace App\Http\Controllers;

use App\Models\Contacte;
use Illuminate\Http\Request;

class ContacteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // 'full_name',
    // 'img',
    // 'phone_number',
    // 'website'
    public function index()
    {
        $this->authorize('viewAny',Contacte::class);
        $Contacte=Contacte::all();
        return response()->json([
            $Contacte
        ],201);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',Contacte::class);
        $data=$request->validate([
            'full_name'=>'required|string|max:30',
            'img'=>'required|image',
            'phone_number'=>'required|string|max:20',
            'website'=>'required|string'
        ]);
        if ($request->hasfile("img")) {
            $img=$request->img;
            $nameimg= time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('contacteimg'),$nameimg);
        }
        $contacte=new Contacte;
        $contacte->full_name=$data['full_name'];
        $contacte->img= $nameimg;
        $contacte->phone_number=$data['phone_number'];
        $contacte->website=$data['website'];
        $contacte->save();
        return response()->json([
            "masseg"=>"insert contacte"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacte $contacte)
    {
        $this->authorize('view',Contacte::class);
        return response()->json([
            $contacte
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacte $contacte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacte $contacte)
    {
        $this->authorize('update',Contacte::class);
        $data=$request->validate([
            'full_name'=>'required|string|max:30',
            'img'=>'image',
            'phone_number'=>'required|string|max:20',
            'website'=>'required|string'
        ]);
        if ($request->hasfile("img")) {
            $img=$request->img;
            $nameimg= time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('contacteimg'),$nameimg);

            $contacte->img= $nameimg;
        }

        $contacte->full_name=$data['full_name'];
        $contacte->phone_number=$data['phone_number'];
        $contacte->website=$data['website'];
        $contacte->save();
        return response()->json([
            "masseg"=>"ubdate contacte"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacte $contacte)
    {
        $this->authorize('delete',Contacte::class);

        $contacte->delete();
        return response()->json([
            "masseg"=>"delete contacte"
        ]);
    }
}
