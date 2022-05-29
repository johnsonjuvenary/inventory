<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <router-link to="/home" class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <img src="backend/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </router-link>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <router-link to="/home" class="nav-link"><i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </router-link>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseemployee"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-user"></i>
            <span>Employees</span>
        </a>
        <div id="collapseemployee" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Employees</h6>
                <router-link to="/add-employee" class="collapse-item">Add Employee</router-link>
                <router-link to="all-employees" class="collapse-item">All Employee</router-link>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSUpplier"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-user"></i>
            <span>Suppliers</span>
        </a>
        <div id="collapseSUpplier" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Suppliers</h6>
                <router-link to="" class="collapse-item">Add Supplier</router-link>
                <router-link to="" class="collapse-item">All Supplier</router-link>
            </div>
        </div>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="forms.html">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Forms</span>
        </a>
    </li> --}}
</ul>
