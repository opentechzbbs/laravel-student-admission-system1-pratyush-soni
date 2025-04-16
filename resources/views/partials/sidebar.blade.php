<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="Dashboard.php" class="brand-link">
            <img src="../public/assets/img/AdminLTELogo.png"class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">E-COM</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="/admin/dashboard" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Check if user is admin -->
               
                    <li class="nav-item">
                        <a href="manage-user.php" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>Manage Students</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-box-seam-fill"></i>
                            <p>
                                Courses
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.course')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Add Courses</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.viewcourse')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>View Courses</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon bi bi-box-seam-fill"></i>
                            <p>Manage Score</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.department')}}" class="nav-link">
                            <i class="nav-icon bi bi-box-seam-fill"></i>
                            <p>Manage Department</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admission.step1')}}" class="nav-link">
                            <i class="nav-icon bi bi-box-seam-fill"></i>
                            <p>Add Student</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admission.index')}}" class="nav-link">
                            <i class="nav-icon bi bi-box-seam-fill"></i>
                            <p>Manage Student</p>
                        </a>
                    </li>
                
                    <li class="nav-item">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link btn btn-link text-start">
            <i class="nav-icon bi bi-box-arrow-in-right"></i>
            <p>Logout</p>
        </button>
    </form>
</li>

            </ul>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
