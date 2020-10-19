@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
      <div class="card border-0 shadow">
        <div class="card-body">
        <form action="{{route('biodata.save')}}" enctype="multipart/form-data" method="POST">
          @csrf
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success')}}
            </div>
            @endif
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nama Biodata</label>
                <input type="text" name="name" id="" class="form-control"  placeholder="" >
                </div>
              </div>
              {{$errors->first('name')}}
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Alamat</label>
                    <input type="text" name="alamat" id="" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">telephone</label>
                    <input type="text" name="telephone" id=""  class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Gender</label>
                    <select name="gender" id=""  class="form-control">
                        <option value="">Pilih gender</option>
                        <option value="hindu">laki-laki</option>
                        <option value="hindu">perempuan</option>
                    </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Image</label>
                    <input type="file" name="images" id="" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Agama</label>
                    <select name="agama" id=""  class="form-control">
                        <option value="">Pilih agama</option>
                        <option value="islam">islam</option>
                    </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Tanggal lahir</label>
                    <input type="date" name="tgl_lahir" id=""  class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Tempat lahir</label>
                    <input type="text" name="tmpt_lahir" id=""  class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Asal sekolah</label>
                    <input type="text" name="asal_sekolah" id=""  class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nama Bapak</label>
                    <input type="text" name="nama_bapak" id=""  class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="" class="form-control"  placeholder="">
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
