@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <div class="sertifikat__top">
         <h1 class="header">Sertifikat Saya</h1>
         <a href="/self/create" class="btn" id="btn-tambah">Tambah</a>
         <div class="profile__filter">
            <div>
               <select class="select" name="selectWaktu" id="selectWaktu">
                  <option value="desc">Terbaru</option>
                  <option value="asc">Terlama</option>
               </select>
            </div>
            <form method="post" action="" class="profile__search">
               @csrf
               <input class="input" type="search" name="cariData" id="cariData" placeholder="Cari sertifikat...">
               <button class="btn">Cari</button>
            </form>
         </div>
      </div>
      <div class="main__certificates relative">
         @if ($certificates->count())
             @foreach ($certificates as $certificate)
               <div class="main__certificate">
                  <img class="main__certificate-img" src="assets/certificates/{{ $certificate->image }}" alt="<?= $row['course']; ?>">
                  <div class="main__certificate-detail">
                     <div class="main__certificate-header">
                        <h3 class="main__certificate-course">{{ $certificate->course }}</h3>
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