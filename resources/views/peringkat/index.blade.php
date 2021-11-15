@extends('layouts.main')

@section('container')
<section class="main">
   <div class="akun">
      <div class="peringkat__top">
         <h1 class="header">Ranking</h1>
         <div>
            <select name="" id="" class="select">
               <option value="">Teratas</option>
               <option value="">Terbawah</option>
            </select>
            <select name="" id="" class="select">
               <option value="">1 - 10</option>
               <option value="">1 - 50</option>
               <option value="">1 - 100</option>
               <option value="">Semua</option>
            </select>
         </div>
      </div>
      <div class="user__container">

         @foreach ($users as $user)
         
         <div class="user__card">
            <div class="user__img">
               <img class="user__pic" src="{{ ($user->is_edited) ? asset('avatar/' . $user->avatar) : $user->avatar }}" alt="{{ $user->name }}">
               <div class="user__peringkat">
                  <p class="user__peringkat-detail">1</p>
               </div>
            </div>
            <div class="user__detail">
               <div>
                  <h2 class="user__nama">{{ $user->name }}</h2>
                  <a class="user__username" href="#">{{ $user->username }}</a>
               </div>
               <hr>
               <div>
                  <div class="flex">
                     <strong class="w-24">Peringkat :</strong>
                     <p>1</p>
                  </div>
                  <div class="flex">
                     <strong class="w-24">Sertifikat :</strong>
                     <p>26</p>
                  </div>
               </div>
            </div>
         </div>
         <hr>
         
         @endforeach

      </div>
   </div>
</section>
@endsection