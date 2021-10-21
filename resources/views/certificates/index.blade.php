@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <div>
         <select class="select" name="" id="">
            <option value="desc" selected>Terbaru</option>
            <option value="asc">Terlama</option>
         </select>
      </div>
      <div class="main__certificates">
         @if ($certificates->count())
             @foreach ($certificates as $certificate)
               <div class="main__certificate">
                  <img class="main__certificate-img" src="assets/certificates/{{ $certificate->image }}" alt="<?= $row['course']; ?>">
                  <div class="main__certificate-detail">
                     <div class="main__certificate-header">
                        <h3 class="main__certificate-course">{{ $certificate->course }}</h3>
                        <small class="main__certificate-user"><a href="#">@{{ $certificate->user->username }}</a></small>
                     </div>
                     <div>
                        <strong>From:</strong>
                        <a class="main__certificate-from" href="#" target="_blank" rel="noopener noreferrer">{{ $certificate->organizer }}</a>
                     </div>
                  </div>
               </div>
             @endforeach
         @else
            <h1 class="header">Data Kosong!!</h1>
         @endif
      </div>
   </div>
</section>
@endsection