<nav class="sidebar sidebar-offcanvas " id="sidebar">
    <ul class="nav position-fixed">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role_as==0)
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/teachers') }}">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Teachers</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
            @endif
            {{-- <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    @if (Auth::user()->role_as==0)
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ url('admin/teacher') }}">Add Teacher</a></li> --}}

                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ url('admin/teachers') }}">Teachers</a></li> --}}

                    {{-- @endif --}}
                {{-- </ul> --}}
            {{-- </div>  --}}
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Form elements</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Charts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Tables</span>
            </a>
        </li> --}}

        @if (Auth::user()->role_as==1||Auth::user()->role_as==0)
        {{-- @if (Auth::user()->role_as==0) --}}
        <li class="nav-item">
            <a class="nav-link 1" href="{{ url('admin/displaystudent') }}">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Students</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
            @endif
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-base" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Students</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-base">
                <ul class="nav flex-column sub-menu">
                    @if (Auth::user()->role_as==0)
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/student') }}">Add Students</a></li>

                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/displaystudent') }}">View Students</a></li>

                    @endif
                </ul>
            </div>
        </li> --}}
        {{-- @endif --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/display') }}" >
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Class</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
            {{-- <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/class') }}"> Add class</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/display') }}"> Class  </a></li>
                </ul>
            </div> --}}
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
                </ul>
            </div>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li> -->
    </ul>
</nav>
