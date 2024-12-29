<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="../dashboard" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                {{-- <img src="../assets/images/logo-dark.svg" class="img-fluid logo-lg" alt="logo" /> --}}
                <h3 class="text-success fw-bolder">Logistics 2</h3>
                {{-- <span class="badge bg-light-success rounded-pill ms-2 theme-version">HOTEL LOGISTIC</span> --}}
            </a>
        </div>
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ auth()->user()->profile_picture ?? asset('/assets/images/default-avatar.png') }}"
                                alt="User Image" class="user-avtar wid-35 rounded-circle"
                                onerror="this.onerror=null; this.src='{{ asset('/assets/images/default-avatar.png') }}';" />
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            @if (auth()->check())
                                <h6 class="mb-1">{{ auth()->user()->username }}</h6>
                                <small>{{ auth()->user()->email }}</small>
                            @else
                                <h6 class="mb-1">Guest</h6>
                                <small>Not logged in</small>
                            @endif
                        </div>
                    </div>
                    <div class="collapse pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3">
                            <a href="#!">
                                <i class="ti ti-user"></i>
                                <span>My Account</span>
                            </a>
                            <a href="#!">
                                <i class="ti ti-settings"></i>
                                <span>Settings</span>
                            </a>
                            <a href="#!">
                                <i class="ti ti-lock"></i>
                                <span>Lock Screen</span>
                            </a>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti ti-power"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Logistic</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-tachometer-alt text-success"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        <span class="pc-badge">2</span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ url('dashboard/analytics') }}">Analytics</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="#">Predictive</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-shopping-cart text-success"></i>
                        </span>
                        <span class="pc-mtext">Procurement</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#">Purchase Requisition</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Budget Approval</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Purchase Order</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ url('/products') }}">Request for Qoute</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Contract Management</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Invoice</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-clipboard-list text-success"></i>
                        </span>
                        <span class="pc-mtext">Audit Management</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#">Audit Schedule</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Audit Findings</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Audit Logs</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Audit History</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Reports</a></li>
                    </ul>
                </li>

                <li class="pc-item">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-file-alt text-success"></i>
                        </span>
                        <span class="pc-mtext">Document Tracking</span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-handshake text-success"></i>
                        </span>
                        <span class="pc-mtext">Vendor Portal</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#">Dashboard</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Purchase Order</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Reqeust for Qoute</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Product Catalog</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Invoice</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Delivery & Shipment Updates</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Help and Support</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-caption">
                    <label>Setting</label>
                </li>
                <li class="pc-item">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-cog text-success"></i>
                        </span>
                        <span class="pc-mtext">User Management</span>
                    </a>
                </li>

        </div>
    </div>
</nav>
