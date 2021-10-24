@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <div>
         @isset ($_GET['sort'])
            <a class="inline-block font-medium py-1.5 px-8 rounded-full {{ ($_GET['sort'] == 'terbaru' || ($_GET['sort'] != 'terbaru' && $_GET['sort'] != 'terlama')) ? 'bg-my-pink text-white' : 'bg-transparent border border-my-pink text-my-pink'}}" href="?sort=terbaru">Terbaru</a>
            <a class="inline-block font-medium py-1.5 px-8 rounded-full {{ ($_GET['sort'] == 'terlama') ? 'bg-my-pink text-white' : 'bg-transparent border border-my-pink text-my-pink'}}" href="?sort=terlama">Terlama</a>
         @else
            <a class="inline-block font-medium py-1.5 px-8 rounded-full bg-my-pink text-white" href="?sort=terbaru">Terbaru</a>
            <a class="inline-block font-medium py-1.5 px-8 rounded-full bg-transparent border border-my-pink text-my-pink" href="?sort=terlama">Terlama</a>
         @endif
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