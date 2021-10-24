@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <div class="sertifikat__top">
         <h1 class="header">Sertifikat Saya</h1>
         <a href="/certificates/create" class="btn" id="btn-tambah">Tambah</a>
         <div class="profile__filter">
            <div>
               @if (request('sort'))
                  <a class="inline-block font-medium py-1.5 px-8 rounded-full {{ (request('sort') == 'terbaru' || (request('sort') != 'terbaru' && request('sort') != 'terlama')) ? 'bg-my-pink text-white' : 'bg-transparent border border-my-pink text-my-pink'}}" href="?sort=terbaru @if (request('s'))&s={{ request('s') }} @endif">Terbaru</a>
                  <a class="inline-block font-medium py-1.5 px-8 rounded-full {{ (request('sort') == 'terlama') ? 'bg-my-pink text-white' : 'bg-transparent border border-my-pink text-my-pink'}}" href="?sort=terlama @if (request('s'))&s={{ request('s') }} @endif">Terlama</a>
               @else
                  <a class="inline-block font-medium py-1.5 px-8 rounded-full bg-my-pink text-white" href="?sort=terbaru">Terbaru</a>
                  <a class="inline-block font-medium py-1.5 px-8 rounded-full bg-transparent border border-my-pink text-my-pink" href="?sort=terlama">Terlama</a>
               @endif
            </div>
            <form action="/certificates" class="profile__search">
               @if (request('sort'))
                   <input type="hidden" name="sort" value="{{ request('sort') }}">
               @endif
               <input class="input" type="search" name="s" value="{{ request('s') }}" placeholder="Cari sertifikat...">
               <button class="btn">Cari</button>
            </form>
         </div>
      </div>
      <div class="main__certificates relative">
         @if ($certificates->count())
             @foreach ($certificates as $certificate)
               <div class="main__certificate">
                  <img class="main__certificate-img" src="/certificates-images/{{ $certificate->image }}" alt="<?= $certificate['course']; ?>">
                  <div class="main__certificate-detail">
                     <div class="main__certificate-header">
                        <h3 class="main__certificate-course">{{ $certificate->course }}</h3>
                     </div>
                     <div>
                        <strong>From:</strong>
                        <a class="main__certificate-from" href="#" target="_blank" rel="noopener noreferrer">{{ $certificate->organizer }}</a>
                     </div>
                     <div class="space-x-1">
                        <a href="/certificates/{{ $certificate->slug }}/edit" class="btn-edit modal-edit-open">Edit</a>
                        <form class="inline-block" action="/certificates/{{ $certificate->slug }}" method="POST">
                           @method('delete')
                           @csrf
                           <button class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                     </div>
                  </div>
               </div>
             @endforeach
         @else
            @empty(request('s'))
               <h1 class="header col-span-full">Data Kosong!!</h1>
            @else
               <h1 class="header col-span-full">Tidak dapat menemukan data!!</h1>
            @endempty
         @endif
      </div>
      {!! $certificates->links() !!}
   </div>
</section>
@endsection