@extends('admin.layout')

@section('judul', 'Edit Akun')

@section('konten_admin')
    <div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
        <div class="mb-3">
            @if ($status == 'author')
                <a href="/dataauthor" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
            @else
                <a href="/dataadmin" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
            @endif
        </div>
        <form action="/editakun/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" value="{{ $data->name }}" name="name" class="bg-white form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" value="{{ $data->email }}" name="email" class="form-control" disabled style="cursor: not-allowed">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role Akun</label>
                <select class="form-select bg-white" aria-label="Default select example" name="role">
                    <option selected value="{{ $data->role }}">
                    @if ($data->role == 'author')
                        Author
                    @else
                        Admin
                    @endif
                    </option>
                    @if ($data->role == 'author')
                        <option value="admin">Admin</option>
                    @else
                        <option value="author">Author</option>
                    @endif
                </select>
                @error('role')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <input type="hidden" name="status" value="{{ $status }}">
            <div class="mb-3">
                <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah data tersebut?')">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection