@extends('layouts.main')

@section('container')
<section class="main">
   <div class="main__container">
      <div class="sertifikat__top">
         <h1 class="header">Sertifikat Saya</h1>
         <a href="/certificates/create" class="btn" id="btn-tambah">Tambah</a>
         <div class="profile__filter">
            <form action="/certificates" class="profile__search">
               <select class="select" name="selectWaktu" id="selectWaktu">
                  <option value="desc">Terbaru</option>
                  <option value="asc">Terlama</option>
               </select>
               <button class="btn">Terapkan</button>
            </form>
            <form action="/certificates" class="profile__search">
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
            @empty($_GET['s'])
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