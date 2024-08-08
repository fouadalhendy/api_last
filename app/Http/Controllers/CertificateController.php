<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //'name_certificate',
        // 'img_certificate',
        $this->authorize('viewAny',Certificate::class);
        $categore=Certificate::all();
        return response()->json([$categore]);
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
        $this->authorize('create',Certificate::class);

        $data=$request->validate([
            'name_certificate'=>'required|string',
            'img_certificate'=>'required|image',
        ]);

        if ($request->hasFile("img_certificate")) {
            $img = $request->img_certificate;
            $imgname = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('certificateimges'), $imgname);
        }
        $certificate=new Certificate;
        $certificate->name_certificate=$data['name_certificate'];
        $certificate->img_certificate=$imgname;
        $certificate->save();
        return response()->json([
            "massge"=>"insert new Certificate"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        $this->authorize('viewAny',Certificate::class);
        return response()->json([
            $certificate
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $this->authorize('create',Certificate::class);
        $data=$request->validate([
            'name_certificate'=>'required|string',
            'img_certificate'=>'image',
        ]);
        if ($request->hasFile("img_certificate")) {
            $img = $request->img_certificate;
            $imgname = time() . '.' . $img->getClientOriginalExtension();;
            $img->move(public_path('certificateimges'), $imgname);
            $certificate->img_certificate=$imgname;
        }
        $certificate->name_certificate=$data['name_certificate'];
        $certificate->save();
        return response()->json([
            "massge"=>"insert new Certificate"
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $this->authorize('delete',Certificate::class);

        $certificate->delete();
        return response()->json([
            "massge"=>"delete certificate"
        ],200);
    }
}
