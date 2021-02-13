<ul
class="navbar-nav bg-royal-blue sidebar sidebar-dark accordion"
id="accordionSidebar"
>
    <!-- Sidebar - Brand -->
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href=""
    >
        <div class="sidebar-brand-icon">
        <i class="fas fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ auth()->user()->role }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item 
        @if(Request::path() === 'dashboard-admin') {{ 'active' }} 
        @elseif (Request::path() === 'dashboard-operator') {{ 'active' }}
        @else {{ '' }}
        @endif
    ">
        <a class="nav-link" href="
            @if(auth()->user()->role == "operator") {{ route('dashboard-operator') }} 
            @else {{ route('dashboard-admin') }}
            @endif
        ">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a
        >
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Manajemen</div>

    <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item
        @if(Request::path() === 'data-barang-dekanat-admin') {{ 'active' }} 
        @elseif (Request::path() === 'data-barang-dekanat-operator') {{ 'active' }}
        @elseif(Request::path() === 'data-barang-laboratorium-admin') {{ 'active' }} 
        @elseif (Request::path() === 'data-barang-laboratorium-operator') {{ 'active' }}
        @else {{ '' }}
        @endif
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-database"></i>
          <span>Data Barang</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Berdasarkan Gedung:</h6>
            <a class="collapse-item" href="
                @if(auth()->user()->role == "operator") {{ route('data-barang-dekanat-operator') }} 
                @else {{ route('data-barang-dekanat-admin') }}
                @endif
            ">Dekanat</a>
            <a class="collapse-item" href="
                @if(auth()->user()->role == "operator") {{ route('data-barang-laboratorium-operator') }} 
                @else {{ route('data-barang-laboratorium-admin') }}
                @endif
            ">Laboratorium</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item
        @if(Request::path() === 'data-ruangan-dekanat-admin') {{ 'active' }} 
        @elseif (Request::path() === 'data-ruangan-dekanat-operator') {{ 'active' }}
        @elseif(Request::path() === 'data-ruangan-laboratorium-admin') {{ 'active' }} 
        @elseif (Request::path() === 'data-ruangan-laboratorium-operator') {{ 'active' }}
        @else {{ '' }}
        @endif
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-door-open"></i>
          <span>Data Ruangan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Berdasarkan Gedung:</h6>
            <a class="collapse-item" href="
                @if(auth()->user()->role == "operator") {{ route('data-ruangan-dekanat-operator') }} 
                @else {{ route('data-ruangan-dekanat-admin') }}
                @endif
            ">Dekanat</a>
            <a class="collapse-item" href="
                @if(auth()->user()->role == "operator") {{ route('data-ruangan-laboratorium-operator') }} 
                @else {{ route('data-ruangan-laboratorium-admin') }}
                @endif
            ">Laboratorium</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item
        @if(Request::path() === 'laporan-barang-dekanat-admin') {{ 'active' }} 
        @elseif (Request::path() === 'laporan-barang-dekanat-operator') {{ 'active' }}
        @elseif(Request::path() === 'laporan-barang-laboratorium-admin') {{ 'active' }} 
        @elseif (Request::path() === 'laporan-barang-laboratorium-operator') {{ 'active' }}
        @else {{ '' }}
        @endif
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Berdasarkan Gedung:</h6>
            <a class="collapse-item" href="
                @if(auth()->user()->role == "operator") {{ route('laporan-barang-dekanat-operator') }} 
                @else {{ route('laporan-barang-dekanat-admin') }}
                @endif
            ">Dekanat</a>
            <a class="collapse-item" href="
                @if(auth()->user()->role == "operator") {{ route('laporan-barang-laboratorium-operator') }} 
                @else {{ route('laporan-barang-laboratorium-admin') }}
                @endif
            ">Laboratorium</a>
          </div>
        </div>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    @if(auth()->user()->role == "admin")
    <!-- Heading -->
    <div class="sidebar-heading">User</div>

    <!-- Nav Item - User -->
    <li class="nav-item 
        @if(Request::path() === 'user-operator-admin') {{ 'active' }} 
        @else {{ '' }}
        @endif
    ">
        <a class="nav-link" href="
            @if(auth()->user()->role == "admin") {{ route('user-operator-admin') }} 
            @endif
        ">
        <i class="fas fa-fw fa-user"></i>
        <span>Data Operator</span></a
        >
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>