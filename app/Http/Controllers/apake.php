<?php

namespace App\Http\Controllers;

use App\Biodata;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function __construct()
    {
        $this->biodata = new Biodata();
    }
    public function index()
    {
        $biodatas = Biodata::all();
        return view('cv.index', compact('biodatas'));
    }
    public function create()
    {
        return view('cv.create');
    }
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
    public function edit($id)
    {
        $biodata = Biodata::findOrFail('id');
        return view("cv.edit", compact('biodata'));
    }
    public function update(Biodata $biodata)
    {
        $biodata->update($this->validateRequest());
        $this->storeImage($biodata);
        return redirect()->back()->with(['success' => 'berhasil diedit' ]);
    }
}
