<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" style="padding-top: 8px;">
        @if(Auth::user()->type=='admin')
            <img src="{{ asset('public/assets/backend/dist/img/place.png') }}"
                class="img-circle elevation-2" alt="User Image">
        @elseif(Auth::user()->type=='student')
            <img src="{{ asset('storage/app/public/student') }}/{{Auth::user()->student->image}}" onerror="this.src='{{ asset('public/assets/backend/dist/img/place.png') }}'"
                class="img-circle elevation-2" alt="User Image" style="height: 2.1rem;">
        @endif
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
                    <a href="{{ route('backend.admin.dashboard') }}" class="nav-link {{ request()->is('backend/admin/dashboard')? 'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(3) == 'students'? 'menu-is-opening menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->segment(3) == 'students'? 'active':'' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Student Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.students.list') }}" class="nav-link {{ request()->is('backend/admin/students/list') ? 'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.students.create') }}" class="nav-link {{ request()->is('backend/admin/students/create') ? 'active':'' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.students.attendance') }}"
                                class="nav-link {{ request()->is('backend/admin/students/attendance') ? 'active':'' }}" >
                                <i class="fas fa-clipboard nav-icon"></i>
                                <p>Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.students.mark-attendance') }}"
                                class="nav-link {{ request()->is('backend/admin/students/mark-attendance') ? 'active':'' }}">
                                <i class="fas fa-check nav-icon"></i>
                                <p>Mark Attendance</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->segment(3) == 'guest'? 'menu-is-opening menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->segment(3) == 'guest'? 'active':'' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Guest Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.guest.list') }}" class="nav-link {{ request()->is('backend/admin/guest/list') ? 'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->segment(3) == 'course'? 'menu-is-opening menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->segment(3) == 'course'? 'active':'' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Course Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.course.list') }}" class="nav-link {{ request()->is('backend/admin/course/list') ? 'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.course.create') }}" class="nav-link {{ request()->is('backend/admin/course/create') ? 'active':'' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->segment(3) == 'course-material'? 'menu-is-opening menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->segment(3) == 'course-material'? 'active':'' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Course Materials
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.course-material.list') }}"
                                class="nav-link {{ request()->is('backend/admin/course-material/list') ? 'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.course-material.create') }}"
                                class="nav-link {{ request()->is('backend/admin/course-material/create') ? 'active':'' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->segment(3) == 'class-schedule'? 'menu-is-opening menu-open':'' }}">
                    <a href="#"
                        class="nav-link {{ request()->segment(3) == 'class-schedule'? 'active':'' }}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Class Schedule
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.class-schedule.list') }}"
                                class="nav-link {{ request()->is('backend/admin/class-schedule/list') ? 'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.class-schedule.create') }}"
                                class="nav-link {{ request()->is('backend/admin/class-schedule/create') ? 'active':'' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->segment(3) == 'holiday'? 'menu-is-opening menu-open':'' }}">
                    <a href="#"
                        class="nav-link {{ request()->segment(3) == 'holiday'? 'active':'' }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Holiday
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.holiday.list') }}"
                                class="nav-link {{ request()->is('backend/admin/holiday/list') ? 'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.holiday.create') }}"
                                class="nav-link {{ request()->is('backend/admin/holiday/create') ? 'active':'' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->segment(3) == 'ip-address'? 'menu-is-opening menu-open':'' }}">
                    <a href="#"
                        class="nav-link {{ request()->segment(3) == 'ip-address'? 'active':'' }}">
                        <i class="nav-icon fas fa-wifi"></i>
                        <p>
                            IP Addresses
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.ip-address.list') }}"
                                class="nav-link {{ request()->is('backend/admin/ip-address/list') ? 'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.ip-address.create') }}"
                                class="nav-link {{ request()->is('backend/admin/ip-address/create') ? 'active':'' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->segment(3) == 'question'? 'menu-is-opening menu-open':'' }}">
                    <a href="{{ route('backend.admin.question.list') }}"
                        class="nav-link {{ request()->segment(3) == 'question'? 'active':'' }}">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            Questions
                        </p>
                    </a>
                </li>
            @endif
            @if(Auth::user()->type=='student')
                <li class="nav-item">
                    <a href="{{ route('backend.student.dashboard') }}"
                        class="nav-link {{ request()->is('backend/student/dashboard') ? 'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.student.attendance.list') }}"
                        class="nav-link {{ request()->is('backend/student/attendance/list') ? 'active':'' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Monthly attendance
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.student.class_schedule.list') }}"
                        class="nav-link {{ request()->is('backend/student/class_schedule/list') ? 'active':'' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Class schedule
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.student.course-material.list') }}"
                        class="nav-link {{ request()->is('backend/student/course-material/list') ? 'active':'' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Course material
                        </p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
