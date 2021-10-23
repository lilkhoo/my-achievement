@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <form class="modal__form" id="form-edit" method="POST" action="/certificates/{{ $certificate->slug }}" enctype="multipart/form-data">
         @method('put')
         @csrf
         <div class="grid">
            <label class="btn-edit" for="image">Klik Untuk Ganti Sertifikat</label>
            <input type="file" name="image" id="image" accept="image/*" class="input-file">
            @error('image')
               <small class="error-message show">{{ $message }}</small>   
            @enderror
         </div>
         <img class="modal__up-img" src="/certificates-images/{{ $certificate->image }}" data-sertifikat>
         <div>
            <label class="akun__form-label" for="course">Course :</label>
            <input class="input @error('course') error @enderror" type="text" name="course" data-form-edit="course" value="{{ old('course', $certificate->course) }}" id="course">
            @error('course')
               <small class="error-message show">{{ $message }}</small>   
            @enderror
         </div>
         <div>
            <label class="akun__form-label" for="organizer">Penyelenggara :</label>
            <input class="input @error('organizer') error @enderror" type="text" name="organizer" value="{{ old('organizer', $certificate->organizer) }}" id="organizer">
            @error('organizer')
               <small class="error-message show">{{ $message }}</small>   
            @enderror
         </div>
         <div class="flex gap-2">
            <button type="submit" name="edit" class="btn-edit">Edit</button>
            <a href="/certificates" class="btn-ghost btn-batal">Batal</a>
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