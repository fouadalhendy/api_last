<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Educatione;
use Illuminate\Http\Request;

class EducationeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //  'level',
    //     'experience'
    //certificate_id
    public function index()
    {
        $this->authorize('viewAny',Educatione::class);
        $Educatione=Educatione::all();
        $certificate=Certificate::all();
        return response()->json([
            $Educatione,
            $certificate
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
    public function store(Request $request,Educatione $educatione)
    {
        $this->authorize('create',Educatione::class);
        $data=$request->validate([
            'level'=>'required|string|max:30',
            'experience'=>'required|string|max:20',
        ]);

        $Educatione=new Educatione;
        $Educatione->level=$data['level'];
        $Educatione->experience=$data['experience'];
        $Educatione->certificate_id=$request->certificate_id;

        $Educatione->save();

        return response()->json([
            "masseg"=>"insert Educatione"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Educatione $educatione)
    {
        $this->authorize('view',Educatione::class);
        return response()->json([
            $educatione
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Educatione $educatione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Educatione $educatione)
    {
        $this->authorize('update',Educatione::class);
        $data=$request->validate([
            'level'=>'required|string|max:30',
            'experience'=>'required|string|max:20',
        ]);


        $educatione->level=$data['level'];
        $educatione->experience=$data['experience'];
        $educatione->certificate_id=$request->certificate_id;

        $educatione->save();

        return response()->json([
            "masseg"=>"update Educatione"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Educatione $educatione)
    {
        $this->authorize('delete',Educatione::class);

        $educatione->delete();
        return response()->json([
            "masseg"=>"delete educatione"
        ]);
    }
}
