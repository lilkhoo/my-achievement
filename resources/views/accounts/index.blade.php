@extends('layouts.main')

@section('container')
<section class="main">
   <div class="akun">
      <h1 class="header">Settings Account</h1>
      <form class="akun__form" method="post" action="/akun/{{ $user->id }}" enctype="multipart/form-data">
         @csrf
         <div class="akun__form-img">
            <h1 class="akun__form-label">Foto Profil</h1>
            <div class="akun__img-container">
               <img class="akun__img" src="{{ ($user->is_edited) ? asset('avatar/' . $user->avatar) : $user->avatar }}" data-foto="{{ ($user->is_edited) ? asset('avatar/' . $user->avatar) : $user->avatar }}" alt="{{ $user->name }}">
               <div>
                  <label class="btn" for="foto">Ganti</label>
                  <input type="file" name="avatar" id="foto" accept="image/*" class="input-file">
               </div>
            </div>
         </div>
         <div>
            <label class="akun__form-label" for="nama">Name :</label>
            <input class="input @error('name') error @enderror" type="text" name="name" id="nama" value="{{ old('name', $user->name ) }}" >
               @error('name')
                  <small class="error-message show">{{ $message }}</small>   
               @enderror
         </div>
         <div>
            <label class="akun__form-label" for="email">Email :</label>
            <input class="input" type="text" name="email" id="email" value="{{ $user->email }}" disabled>
         </div>
         <div>
            <label class="akun__form-label" for="username">Username :</label>
            <input class="input @error('username') error @enderror" type="text" name="username" id="username" value="{{ old('username', $user->username) }}">
               @error('username')
                  <small class="error-message show">{{ $message }}</small>   
               @enderror
          </div>
          <div>
            <label class="akun__form-label" for="password">Password Baru :</label>
            <input class="input @error('password') error @enderror" type="password" name="password" id="password">
               @error('password')
                   <small class="error-message show">{{ $message }}</small>   
               @enderror
          </div>
         <button class="btn">Simpan Perubahan</button>
      </form>
   </div>
</section>

<script>
   const foto = document.querySelector('#foto');
   const dataFoto = document.querySelector('[data-foto]');
   foto.addEventListener('change', () => {
      const [file] = foto.files;
      if (file) {
         dataFoto.src = URL.createObjectURL(file);
      }

      dataFoto.addEventListener('error', () => {
         dataFoto.src = dataFoto.getAttribute('data-foto');
         alert("Maaf, sepertinya yang ada upload bukan gambar!");
      });
   });
</script>

@endsection