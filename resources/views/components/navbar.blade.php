<nav class="nav">
   <div class="nav__container">
      <a href="/" class="nav__logo">
         <i class='bx bx-award'></i>
      </a>
      <div class="nav__links-container">
         <div class="nav__links">
            <div>
               <a class="nav__link" href="/user">User</a>
            </div>
            <div>
               <a class="nav__link" href="/peringkat">Peringkat</a>
            </div>
         </div>
         <div class="nav__profile-container">
            <img class="nav__profile-img" src="{{ (Auth::user()->is_edited) ? asset('avatar/' . Auth::user()->avatar) : Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
            <div class="nav__profile-links">
               <a class="nav__profile-link" href="/profil">
                  <i class='bx bx-user nav__profile-link-icon'></i>
                  <span>Profil</span>
               </a>
               <a class="nav__profile-link" href="/certificates">
                  <i class='bx bx-award nav__profile-link-icon'></i>
                  <span>Sertifikat</span>
               </a>
               <a class="nav__profile-link" href="/akun">
                  <i class='bx bx-user-circle nav__profile-link-icon'></i>
                  <span>Akun</span>
               </a>
               <hr>
               <form method="POST" action="/logout">
                  @csrf
                  <button class="nav__profile-link">
                     <i class='bx bx-log-out-circle nav__profile-link-icon'></i>
                     <span>Keluar</span>
                  </button>
               </form>
            </div>
         </div>
      </div>
   </div>
</nav>