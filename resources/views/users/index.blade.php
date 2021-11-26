@extends('layouts.main')

@section('container')
<section class="main">
   <div class="user">
      <form action="/user" class="user__search">
         <input class="input" type="search" name="search" placeholder="Masukkan username/nama..." value="{{ request('search') }}">
         <button class="btn">Cari</button>
      </form>
      <div class="user__recomendation">
         <h1 class="header">{{ (request('search')) ? 'Hasil pencarian' : 'Rekomendasi'  }}</h1>
         @if(count($users))
         <div class="user__container">
            @foreach ($users as $user)
            <div class="user__card">
               <div class="user__img">
                  <img class="user__pic" src="{{ ($user->is_edited) ? asset('avatar/' . $user->avatar) : $user->avatar }}" alt="{{ $user->name }}">
               </div>
               <div class="user__detail">
                  <div>
                     <h2 class="user__name">{{ $user->name }}</h2>
                     <a class="user__username" href="#">{{ $user->username }}</a>
                  </div>
                  <hr>
                  <div>
                     <div class="flex">
                        <strong class="w-24">Peringkat</strong>
                        <p>1</p>
                     </div>
                     <div class="flex">
                        <strong class="w-24">Sertifikat</strong>
                        <p>{{ $user->certificate->count() }}</p>
                     </div>
                  </div>
               </div>
            </div>
            <hr>
            @endforeach
         </div>
         @else
         <p class="font-bold italic text-red-600 md:text-lg sm:text-base text-sm text-center">Kami tidak bisa menemukan : {{ request('search') }}</p>
         @endif
      </div>
   </div>
</section>
@endsection