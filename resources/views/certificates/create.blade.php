@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <form class="modal__form" id="form-tambah" method="POST" action="/certificates" enctype="multipart/form-data">
         @csrf
         <div class="grid">
            <label class="btn"  for="image">Klik Untuk Pilih Sertifikat</label>
            <input type="file" name="image" id="image" accept="image/*" class="input-file">
         </div>
         <img class="modal__up-img" data-sertifikat src="" alt="">
         <div>
            <label class="akun__form-label" for="course">Course :</label>
            <input class="input" type="text" name="course" id="course">
         </div>
         <div>
            <label class="akun__form-label" for="organizer">Penyelenggara :</label>
            <input class="input" type="text" name="organizer" id="organizer">
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