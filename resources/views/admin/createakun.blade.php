@extends('admin.layout')

@section('judul', 'Tambah Akun')

@section('konten_admin')
    <div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" value="{{ old('name') }}" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap">
                @error('name')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="bg-white form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                @error('email')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="bg-white form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi">
                @error('password')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="bg-white form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ulangi Kata Sandi">
                @error('password_confirmation')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role Akun</label>
                <select class="form-select bg-white" aria-label="Default select example" name="role">
                    <option selected value="author">Author</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan data tersebut?')">Submit</button>
            </div>
        </form>
    </div>
@endsection