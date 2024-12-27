<div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <div class="logo">
          <a href="/dashboard">
            <img src="{{asset('assets/images/logo/skyventure.png')}}" 
                 alt="Logo" 
                 style="width: 80px; height: auto; object-fit: cover; border-radius: 8px;">
          </a>
        </div>
        
        <!-- Close Button -->
        <div class="toggler">
            <a href="#" class="sidebar-hide d-xl-none d-flex justify-content-center align-items-center" 
               style="width: 48px; height: 48px; font-size: 28px;">
              <i class="bi bi-x"></i>
            </a>
          </div>
          
      </div>
    </div>
    
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-item active">
          <a href="/dashboard" class="sidebar-link">
            <i class="bi bi-house"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-folder"></i>
            <span>Features</span>
          </a>
          <ul class="submenu active">
            <li class="submenu-item">
              <a href="{{route('tenant.index')}}">Tenants</a>
            </li>
            <li class="submenu-item">
              <a href="{{route('news.index')}}">News</a>
            </li>
            <li class="submenu-item">
              <a href="{{route('event.index')}}">Events</a>
            </li>
            <li class="submenu-item">
              <a href="{{route('facility.index')}}">Facilities</a>
            </li>
            <li class="submenu-item">
              <a href="{{route('document.index')}}">Documents</a>
            </li>
            @if (Auth::user()->role == 'superadmin')
            <li class="submenu-item">
              <a href="{{route('account.index')}}">Account</a>
            </li>
            @endif
          </ul>
        </li>
        <li class="sidebar-item">
          <a href="{{route('logout')}}" class="sidebar-link">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </div>
    
    <button class="sidebar-toggler btn x">
      <i data-feather="x"></i>
    </button>
  </div>
  