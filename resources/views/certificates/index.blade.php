@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <form action="/certificates" class="profile__search">
         <select class="select" name="selectWaktu" id="selectWaktu">
            <option value="desc">Terbaru</option>
            <option value="asc">Terlama</option>
         </select>
         <button class="btn">Terapkan</button>
      </form>
      <div class="main__certificates">
         @if ($certificates->count())
             @foreach ($certificates as $certificate)
               <div class="main__certificate">
                  <img class="main__certificate-img" src="/certificates-images/{{ $certificate->image }}" alt="<?= $certificate->course ?>">
                  <div class="main__certificate-detail">
                     <div class="main__certificate-header">
                        <h3 class="main__certificate-course">{{ $certificate->course }}</h3>
                        <small class="main__certificate-user"><a href="userinfo/{{ $certificate->user->username }}">{{ "@" . $certificate->user->username }}</a></small>
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
      <div>
         {!! $certificates->links() !!}
      </div>
   </div>
</section>
@endsection