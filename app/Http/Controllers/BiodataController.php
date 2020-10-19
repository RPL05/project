<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Biodata;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->biodata = new Biodata();
    }
    public function index()
    {
        $biodatas = Biodata::all();
        return view('backend.cv.index', compact('biodatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $biodata = Biodata::create($this->validateRequest());
        $this->storeImage($biodata);
        return redirect()->back()->with(['success' => 'Biodata berhasil dibuat' ]);
    }
    private function validateRequest(){
        return tap(request()->validate([
            'name'          => 'required',
            'alamat'        => 'required',
            'images'        => 'file|image|max:5000',
            'telephone'     => 'required',
            'gender'        => 'required',
            'agama'         => 'required',
            'tgl_lahir'     => 'required',
            'tmpt_lahir'    => 'required',
            'asal_sekolah'  => 'required',
            'nama_bapak'    => 'required',
            'nama_ibu'      => 'required',
        ]), function(){
            if(request()->hasFIle('images')){
                request()->validate([
                    'images'  => 'file|image|max:5000',
                ]);
            }
        });
    }
    private function storeImage($biodata){
        if(request()->has('images')){
            $biodata->update([
                'images' => request()->images->store('uploads','public'),
            ]);
            $image = Image::make(public_path('storage/'. $biodata->images))->fit(300,300,null, 'top-left');
            $image->save();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);
        return view("backend.cv.edit", compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Biodata $biodata)
    {
        $biodata->update($this->validateRequest());
        $this->storeImage($biodata);
        return redirect()->back()->with(['success' => 'berhasil diedit' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biodata $biodata)
    {
        $biodata->delete();

        if(\File::exists(public_path('storage/'. $biodata->image))){
            \File::delete(public_path('storage/'. $biodata->image));
        }

        return redirect()->back()->with(['success' => 'Data berhasil di hapus']);
    }
    public function show($id)
    {
        $biodata = Biodata::find($id);

        return view('backend.cv.show', compact('biodata'));
    }
}
