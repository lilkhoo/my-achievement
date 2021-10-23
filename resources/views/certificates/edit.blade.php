@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <form class="modal__form" id="form-edit" method="POST" action="" enctype="multipart/form-data">
         <div class="grid">
            <label class="btn-edit" for="sertifikatEdit">Klik Untuk Ganti Sertifikat</label>
            <input type="file" name="gambar" id="sertifikatEdit" data-form-edit="sertifikat" accept="image/*" class="input-file sertifikat">
            <small class="error-message">Error Message</small>
         </div>
         <img class="modal__up-img" data-sertifikat data-sertifikat-edit alt="">
         <div>
            <label class="akun__form-label" for="courseEdit">Course :</label>
            <input class="input" type="text" name="course" data-form-edit="course" value="" id="courseEdit">
            <small class="error-message">Error Message</small>
         </div>
         <div>
            <label class="akun__form-label" for="penyelenggaraEdit">Penyelenggara :</label>
            <input class="input" type="text" name="penyelenggara" data-form-edit="penyelenggara" value="" id="penyelenggaraEdit">
            <small class="error-message">Error Message</small>
         </div>
         <input type="hidden" name="id" id="idEdit">
         <div class="flex gap-2">
            <button type="submit" name="edit" class="btn-edit">Edit</button>
            <button type="reset" class="btn-ghost btn-batal" onclick="modalClose();">Batal</button>
         </div>
      </form>
   </div>
</section>
<script>
   const sertifikat = document.querySelector('#sertifikat');
   const dataSertifikat = document.querySelector('[data-sertifikat]');
   
   sertifikat.addEventListener('change', () => {
      const [file] = sertifikat.files;
      if (file) {
         dataSertifikat.src = URL.createObjectURL(file);
      }
   });
</script>
@endsection