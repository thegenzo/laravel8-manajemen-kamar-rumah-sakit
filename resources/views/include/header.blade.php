<div class="header-top">
    <div class="container">
        <div>
            <a href=""><img src="{{ asset('assets/images/logo-kota-baubau.png') }}" alt="Logo" style="width: 8%; height: 8%; margin-left: 50px;"></a>
            <span class="d-inline"><h5>RSUD Kota Baubau</h5></span>
        </div>
       
        <!-- Burger button responsive -->
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
        <div class="header-top-right">

            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(auth()->user()->level == 'admin')
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                            <p class="mb-0 text-sm text-gray-600">Admin</p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                <img src="{{ asset('assets/images/faces/2.jpg') }}">
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                            <p class="mb-0 text-sm text-gray-600">Perawat - Gedung {{ \App\Models\Perawat::where('id_user', auth()->user()->id)->first()->staf_gedung }}</p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                <img src="{{ asset('assets/images/faces/1.jpg') }}">
                            </div>
                        </div>
                    </div>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li>
                        <h6 class="dropdown-header">Halo, {{ auth()->user()->name }}!</h6>
                    </li>
                    {{-- <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                            Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                            Settings</a></li>
                    <li> --}}
                        <hr class="dropdown-divider">
                    </li>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <li>
                            <button type="submit" class="dropdown-item"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</button>
                        </li>
                    </form>
                </ul>
            </div>                                                      
        </div>
    </div>
</div>