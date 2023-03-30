<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('public/assets/backend/dist/img/place.png') }}"
                class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a id="navbar" class="nav-link" href="#">
                {{ Auth::user()->name }}
            </a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @if(Auth::user()->type=='admin')
                <li class="nav-item">
                    <a href="{{ route('backend.admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Student Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.students.list') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.students.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.students.attendance') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Attendance</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Guest Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.guest.list') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Course Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.course.list') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.course.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Class Schedule
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.class-schedule.list') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.class-schedule.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Holiday
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.holiday.list') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.holiday.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.question.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            Questions
                        </p>
                    </a>
                </li>
            @endif
            @if(Auth::user()->type=='student')
                <li class="nav-item">
                    <a href="{{ route('backend.student.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.student.attendance.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Monthly attendance
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.student.class_schedule.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Class schedule
                        </p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
