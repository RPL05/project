@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
      <div class="card border-0 shadow">
        <div class="card-body">
        <form action="{{route('backend.cv.update',$biodata->id)}}" enctype="multipart/form-data" method="POST">
          @csrf
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success')}}
            </div>
            @endif
            @method('PATCH')
            <div class="row">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{$biodata->name}}" id="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{$biodata->alamat}}" id="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Gender</label>
                                <select name="gender" class="form-control" value="{{$biodata->gender}}" id="">
                                    <option>Pilih Gender</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="images" class="form-control" value="{{$biodata->images}}" id="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Agama</label>
                                <select name="agama" class="form-control" value="{{$biodata->agama}}" id="">
                                    <option>Pilih Agama</option>
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Hindu</option>
                                    <option>Budha</option>
                                    <option>Konghuchu</option>
                                    <option>Ateis</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tmpt_lahir" class="form-control" value="{{$biodata->tmpt_lahir}}" id="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="{{$biodata->tgl_lahir}}" id="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" value="{{$biodata->asal_sekolah}}" id="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Telpon</label>
                            <input type="text" name="telephone" class="form-control" value="{{$biodata->telephone}}" id="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nama Bapak</label>
                            <input type="text" name="nama_bapak" class="form-control" value="{{$biodata->nama_bapak}}" id="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" value="{{$biodata->nama_ibu}}" id="" >
                        </div>
                    </div>
            </div>
            <div class="pt-2 mb-2">
              <button type="submit" class="btn btn-outline-info" >
                  Save
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
