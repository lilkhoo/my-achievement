@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <form class="modal__form" id="form-tambah" method="POST" action="/certificates" enctype="multipart/form-data">
         @csrf
         <div class="grid">
            <label class="btn"  for="image">Klik Untuk Pilih Sertifikat</label>
            <input type="file" name="image" id="image" accept="image/*" class="input-file">
            @error('image')
               <small class="error-message show">{{ $message }}</small>   
            @enderror
         </div>
         <img class="modal__up-img" data-sertifikat src="" alt="">
         <div>
            <label class="akun__form-label" for="course">Course :</label>
            <input class="input @error('course') error @enderror" type="text" name="course" id="course">
            @error('course')
               <small class="error-message show">{{ $message }}</small>   
            @enderror
         </div>
         <div>
            <label class="akun__form-label" for="organizer">Penyelenggara :</label>
            <input class="input @error('organizer') error @enderror" type="text" name="organizer" id="organizer">
            @error('organizer')
               <small class="error-message show">{{ $message }}</small>   
            @enderror
         </div>
         <div class="flex gap-2">
            <button class="btn">Tambah</button>
            <a href="/self" class="btn-ghost btn-batal">Batal</a>
         </div>
      </form>
   </div>
</section>
<script>
   const sertifikat = document.querySelector('#image');
   const dataSertifikat = document.querySelector('[data-sertifikat]');
   
   sertifikat.addEventListener('change', () => {
      const [file] = sertifikat.files;
      if (file) {
         dataSertifikat.src = URL.createObjectURL(file);
      }
   });
</script>
@endsection