<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyCertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('certificates.my-certificates', [
            'certificates' => Certificate::filter(request(['s']))->where('user_id', Auth::id())->orderBy('course')->paginate(12),
            'title' => 'Sertifikat Saya | My Achievement'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificates.create', [
            'title' => 'Tambah Sertifikat | My Achievement'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course' => 'required|max:255',
            'organizer' => 'required|max:255',
            'image' => 'required|image|file|max:2048'
        ]);

        $validatedData['slug'] = Str::lower(Str::slug($validatedData['course'])) . '-' . mt_rand(1000, 9999);
        $validatedData['user_id'] = Auth::id();
        $validatedData['image'] = $request->file('image')->store(null);

        Certificate::create($validatedData);

        return redirect('/certificates');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        return view('certificates.edit', [
            'title' => 'Edit ' . $certificate->course . ' | My Achievement',
            'certificate' => $certificate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        $oldImage = Certificate::firstWhere('id', $certificate->id)->image;

        $rules = [
            'course' => 'required|max:255',
            'organizer' => 'required|max:255',
        ];

        if ($request->file('image')) {
            Storage::delete($oldImage);
            $rules['image'] = 'required|image|file|max:2048';
        }

        $validatedData = $request->validate($rules);

        $validatedData['slug'] = Str::lower(Str::slug($validatedData['course'])) . '-' . mt_rand(1000, 9999);
        $validatedData['user_id'] = Auth::id();
        
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store(null);
        }

        Certificate::where('id', $certificate->id)->update($validatedData);

        return redirect('/certificates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        Certificate::destroy($certificate->id);
        Storage::delete($certificate->image);

        return redirect('/certificates');
    }
}
