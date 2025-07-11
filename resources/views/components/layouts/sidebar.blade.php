<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sidebar" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link {{request()->segment(1) == 'dashboard' ? 'active' : ''}} " href="{{route('dashboard')}}" >
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            @if (auth()->user()->level==1 )
              <a class="nav-link {{request()->segment(1) == 'client' ? 'active' : ''}} " href="{{route('customer')}}" >
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Client
              </a>
              <a class="nav-link {{request()->segment(1) == 'proyek' ? 'active' : ''}} " href="{{route('proyek')}}" >
                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                Proyek
              </a>

            <a class="nav-link {{request()->segment(1) == 'jadwal' ? 'active' : ''}} " href="{{route('jadwal')}}" >
              <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
              Jadwal (CPM)
            </a>
            @endif
            @if (auth()->user()->level==1 || auth()->user()->level==2)
            <a class="nav-link {{request()->segment(1) == 'aktivitas' ? 'active' : ''}} " href="{{route('aktivitas')}}" >
              <div class="sb-nav-link-icon"><i class="fas fa-bolt"></i></div>
              Aktivitas
            </a>  
            <a class="nav-link {{request()->segment(1) == 'suplai' ? 'active' : ''}} " href="{{route('suplai')}}" >
              <div class="sb-nav-link-icon"><i class="fas fa-bolt"></i></div>
              Suplai
            </a>  
            @endif
          
            @if (auth()->user()->level==1 )
            <div class="sb-sidenav-menu-heading">Master Data</div>
            <a class="nav-link  {{ request()->segment(1) == 'master' ? 'collapsed' : '' }}
                " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Master Data
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->segment(1) == 'master' ? 'show' : '' }}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{request()->segment(2) == 'user' ? 'active' : ''}} " href="{{route('setting.user')}}" >
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                  User Aplikasi
                </a>
                <a class="nav-link {{request()->segment(2) == 'tukang' ? 'active' : ''}} " href="{{route('master.tukang')}}" >
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                  Tukang
                </a>
                 <a class="nav-link {{request()->segment(2) == 'bahan' ? 'active' : ''}}" href="{{route('master.bahan')}}" >
                  <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                  Bahan Material
                </a> 
              
              </nav>
            </div>
            @endif
            @if (auth()->user()->level==1 || auth()->user()->level==3) 
              <div class="sb-sidenav-menu-heading">Laporan</div>
              <a class="nav-link  {{ request()->segment(1) == 'laporan' ? 'active' : '' }}
                  " href="{{route('laporan')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-bar-chart"></i></div>
                  Laporan-Laporan
              </a>
          
            @endif
            {{-- @if (auth()->user()->level==1 )
            <a class="nav-link  {{ request()->segment(1) == 'setting' ? 'collapsed' : '' }}
                " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                Setting
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->segment(1) == 'setting' ? 'show' : '' }}" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{request()->segment(2) == 'user' ? 'active' : ''}} " href="{{route('setting.user')}}" >
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                  User Aplikasi
                </a>
                <a class="nav-link {{request()->segment(2) == 'harikerja' ? 'active' : ''}}" href="{{route('setting.harikerja')}}" >
                  <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                  Hari Kerja
              </a>
             
              </nav>
            </div>
            @endif --}}
           
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged level: {{auth()->user()->levels()}}</div>    
        </div>
      </nav>
</div>