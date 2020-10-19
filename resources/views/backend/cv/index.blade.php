@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="mb-3">
        <a href="{{route('backend.cv.create')}}" class="btn btn-outline-primary">
          tambah Biodata
      </a>
      </div>

      <div class="card border-0 shadow">
        <div class="px-3 py-3">
          <h4 class="text-muted">Master Biodata</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>image</th>
                <th>telephone</th>
                <th>gender</th>
                <th>agama</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($biodatas as $biodata)
                @csrf
                @method('DELETE')
            </form>
              <tr>
                <td>{{$biodata->name}}</td>
                <td>{{$biodata->alamat}}</td>
                <td><img src="{{asset('storage/'. $biodata->images)}}" width="40px" height="40px" alt=""></td>
                <td>{{$biodata->telephone}}</td>
                <td>{{$biodata->gender}}</td>
                <td>{{$biodata->agama}}</td>
                <td>
                @csrf
                @method('DELETE')
                <a href="{{route('backend.cv.edit', $biodata->id)}}" class="btn btn-outline-primary btn-sm">Edit</a>
                    <a href="{{route('backend.cv.show', $biodata->id)}}" class="btn btn-outline-primary btn-sm">Show</a>
                    <a href="{{route('backend.cv.delete', $biodata->id)}}" class="btn btn-outline-danger btn-sm">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
