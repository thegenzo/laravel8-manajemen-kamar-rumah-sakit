<nav class="main-navbar">
    <div class="container">
        <ul>
            <li class="menu-item ">
                <a href="/dashboard" class='menu-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->level == 'admin')
            <li class="menu-item has-sub">
                <a href="#" class='menu-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>User</span>
                </a>
                <div class="submenu ">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="/admin" class='submenu-link'>Admin</a>
                            </li>        
                            <li class="submenu-item">
                                <a href="/perawat" class='submenu-link'>Perawat</a>                    
                            </li>                           
                        </ul>                          
                    </div>
                </div>
            </li>
            <li class="menu-item ">
                <a href="/kamar" class='menu-link'>
                    <i class="bi bi-stack"></i>
                    <span>Kamar</span>
                </a>
            </li>
            @endif
            <li class="menu-item ">
                <a href="/dokter" class='menu-link'>
                    <i class="bi bi-shield-fill-plus"></i>
                    <span>Dokter</span>
                </a>
            </li>
            <li class="menu-item active has-sub">
                <a href="#" class='menu-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Pasien</span>
                </a>
                <div class="submenu ">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Pasien Dewasa</a>        
                                <!-- 3 Level Submenu -->
                                <ul class="subsubmenu">
                                    
                                    <li class="subsubmenu-item ">
                                        <a href="/pasien" class="subsubmenu-link">Pasien Masuk</a>
                                    </li>
                                    
                                    <li class="subsubmenu-item ">
                                        <a href="/pasien-keluar" class="subsubmenu-link">Pasien Keluar</a>
                                    </li>
                                    @if (auth()->user()->level =='admin')
                                    <li class="subsubmenu-item ">
                                        <a href="/antrian" class="subsubmenu-link">Antrian Pasien</a>
                                    </li> 
                                    @endif                                  
                                </ul>
                            </li>
                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Pasien Anak</a>        
                                <!-- 3 Level Submenu -->
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="/pasien-anak" class="subsubmenu-link">Pasien Masuk</a>
                                    </li>
                                    
                                    <li class="subsubmenu-item ">
                                        <a href="/pasien-keluar-anak" class="subsubmenu-link">Pasien Keluar</a>
                                    </li>
                                    @if (auth()->user()->level =='admin')
                                    <li class="subsubmenu-item ">
                                        <a href="/antrian-anak" class="subsubmenu-link">Antrian Pasien Anak</a>
                                    </li>        
                                    @endif                           
                                </ul>
                            </li>                      
                        </ul>                          
                    </div>
                </div>
            </li>       
        </ul>
    </div>                    
</nav>