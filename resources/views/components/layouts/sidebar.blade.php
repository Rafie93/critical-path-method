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
            {{-- @if (auth()->user()->level!=3) --}}
              <a class="nav-link {{request()->segment(1) == 'client' ? 'active' : ''}} " href="{{route('customer')}}" wire:navigate>
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Client
              </a>
              <a class="nav-link {{request()->segment(1) == 'proyek' ? 'active' : ''}} " href="{{route('proyek')}}" wire:navigate>
                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                Proyek
              </a>
            {{-- @endif --}}

            <a class="nav-link {{request()->segment(1) == 'jadwal' ? 'active' : ''}} " href="{{route('jadwal')}}" wire:navigate>
              <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
              Jadwal (CPM)
            </a>
            {{-- @if (auth()->user()->role==1 || auth()->user()->role==3) --}}
            <a class="nav-link {{request()->segment(1) == 'aktivitas' ? 'active' : ''}} " href="{{route('aktivitas')}}" wire:navigate>
              <div class="sb-nav-link-icon"><i class="fas fa-bolt"></i></div>
              Aktivitas
            </a>  
            <a class="nav-link {{request()->segment(1) == 'suplai' ? 'active' : ''}} " href="{{route('suplai')}}" wire:navigate>
              <div class="sb-nav-link-icon"><i class="fas fa-bolt"></i></div>
              Suplai
            </a>  
            {{-- @endif --}}
          
            {{-- @if (auth()->user()->role==1 ) --}}
            <div class="sb-sidenav-menu-heading">Master Data</div>
            <a class="nav-link  {{ request()->segment(1) == 'master' ? 'collapsed' : '' }}
                " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Master Data
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->segment(1) == 'master' ? 'show' : '' }}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{request()->segment(2) == 'user' ? 'active' : ''}} " href="{{route('setting.user')}}" wire:navigate>
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                  User Aplikasi
                </a>
                <a class="nav-link {{request()->segment(2) == 'tukang' ? 'active' : ''}} " href="{{route('master.tukang')}}" wire:navigate>
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                  Tukang
                </a>
                 <a class="nav-link {{request()->segment(2) == 'bahan' ? 'active' : ''}}" href="{{route('master.bahan')}}" wire:navigate>
                  <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                  Bahan Material
                </a> 
              
              </nav>
            </div>
            {{-- @endif
            @if (auth()->user()->role==1 || auth()->user()->role==3) --}}
              <div class="sb-sidenav-menu-heading">Laporan</div>
              <a class="nav-link  {{ request()->segment(1) == 'laporan' ? 'active' : '' }}
                  " href="{{route('laporan')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-bar-chart"></i></div>
                  Laporan-Laporan
              </a>
              {{-- <div class="collapse {{ request()->segment(1) == 'laporan' ? 'show' : '' }}" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                 
                  <a class="nav-link {{request()->segment(2) == 'laporan-pesanan' ? 'active' : ''}} "
                    href="{{route('laporan.form','laporan-pesanan')}}" wire:navigate>
                    Laporan Jadwal Proyek
                  </a>
                  <a class="nav-link {{request()->segment(2) == 'laporan-pembayaran' ? 'active' : ''}}"
                    href="{{route('laporan.form','laporan-pembayaran')}}" wire:navigate>
                      Laporan Proyek dan Kegiatan
                  </a>
                  <a class="nav-link {{request()->segment(2) == 'laporan-kehadiran' ? 'active' : ''}}" 
                    href="{{route('laporan.form','laporan-kehadiran')}}" wire:navigate>
                    Laporan Aktivitas Proyek
                  </a>
                  <a class="nav-link {{request()->segment(2) == 'laporan-pencapaian' ? 'active' : ''}}" 
                    href="{{route('laporan.form','laporan-pencapaian')}}" wire:navigate>
                    Laporan Pemakaian Bahan
                  </a>
                  <a class="nav-link {{request()->segment(2) == 'laporan-pencapaian-sales' ? 'active' : ''}}" 
                    href="{{route('laporan.form','laporan-pencapaian-sales')}}" wire:navigate>
                    Laporan Perhitungan Proyek
                  </a>
                </nav>
              </div>     --}}
            {{-- @endif --}}
            {{-- @if (auth()->user()->role==1 )
            <a class="nav-link  {{ request()->segment(1) == 'setting' ? 'collapsed' : '' }}
                " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                Setting
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->segment(1) == 'setting' ? 'show' : '' }}" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{request()->segment(2) == 'user' ? 'active' : ''}} " href="{{route('setting.user')}}" wire:navigate>
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                  User Aplikasi
                </a>
                <a class="nav-link {{request()->segment(2) == 'harikerja' ? 'active' : ''}}" href="{{route('setting.harikerja')}}" wire:navigate>
                  <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                  Hari Kerja
              </a>
             
              </nav>
            </div>
            @endif --}}
           
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged Role: {{auth()->user()->levels()}}</div>    
        </div>
      </nav>
</div>