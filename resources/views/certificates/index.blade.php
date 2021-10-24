@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <div class="profile__filter">
         <div>
            @if (request('sort'))
               <a class="inline-block font-medium py-1.5 px-8 rounded-full {{ (request('sort') == 'terbaru' || (request('sort') != 'terbaru' && request('sort') != 'terlama')) ? 'bg-my-pink text-white' : 'bg-transparent border border-my-pink text-my-pink'}}" href="?sort=terbaru @if (request('s'))&s={{ request('s') }} @endif">Terbaru</a>
               <a class="inline-block font-medium py-1.5 px-8 rounded-full {{ (request('sort') == 'terlama') ? 'bg-my-pink text-white' : 'bg-transparent border border-my-pink text-my-pink'}}" href="?sort=terlama @if (request('s'))&s={{ request('s') }} @endif">Terlama</a>
            @else
               <a class="inline-block font-medium py-1.5 px-8 rounded-full bg-my-pink text-white" href="?sort=terbaru @if (request('s'))&s={{ request('s') }} @endif">Terbaru</a>
               <a class="inline-block font-medium py-1.5 px-8 rounded-full bg-transparent border border-my-pink text-my-pink" href="?sort=terlama @if (request('s'))&s={{ request('s') }} @endif">Terlama</a>
            @endif
         </div>
         <form action="/" class="profile__search">
            @if (request('sort'))
                <input type="hidden" name="sort" value="{{ request('sort') }}">
            @endif
            <input class="input" type="search" name="s" value="{{ request('s') }}" placeholder="Cari sertifikat...">
            <button class="btn">Cari</button>
         </form>
      </div>
      <div class="main__certificates">
         @if ($certificates->count())
             @foreach ($certificates as $certificate)
               <div class="main__certificate">
                  <img class="main__certificate-img" src="/certificates-images/{{ $certificate->image }}" alt="<?= $certificate->course ?>">
                  <div class="main__certificate-detail">
                     <div class="main__certificate-header">
                        <h3 class="main__certificate-course">{{ $certificate->course }}</h3>
                        <small class="main__certificate-user"><a href="/user/{{ $certificate->user->username }}">{{ "@" . $certificate->user->username }}</a></small>
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
      {!! $certificates->links() !!}
   </div>
</section>
@endsection