@extends('layouts.main')

@section('container')
<section class="main">
   <div class="user">
      <div class="user__search">
         <input class="input" type="text" name="" id="" placeholder="Masukkan username/nama...">
         <button class="btn">Cari</button>
      </div>
      <div class="user__recomendation">
         <h1 class="header">Rekomendasi</h1>
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
                        <p>26</p>
                     </div>
                  </div>
               </div>
            </div>
            <hr>

            @endforeach
         </div>
      </div>
   </div>
</section>
@endsection