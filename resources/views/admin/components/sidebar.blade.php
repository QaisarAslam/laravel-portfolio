<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    {{-- Sidebar - Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>
    {{-- Divider --}}
    <hr class="sidebar-divider my-0">
    {{-- Nav Item - Dashboard --}}
    <li class="nav-item @if(request()->url() == url('/admin/dashboard')) {{'active'}} @endif">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    {{-- Divider --}}
    <hr class="sidebar-divider">
    {{-- Heading --}}
    <div class="sidebar-heading text-white">
        Crud
    </div>
    <li class="nav-item @if(request()->url() == url('/admin/categories')) {{'active'}} @endif">
        <a class="nav-link" href="{{ url('/admin/categories') }}">
            <i class="fab fa-cuttlefish"></i>
            <span>Categories</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->url() == url('/admin/frameworks/')) {{'active'}} @endif">
        <a class="nav-link" href="{{ url('/admin/frameworks') }}">
            <i class="fab fa-phoenix-framework"></i>
            <span>Frameworks</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->url() == url('/admin/tags/')) {{'active'}} @endif">
        <a class="nav-link" href="{{ url('/admin/tags') }}">
            <i class="fas fa-tags"></i>
            <span>Tags</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->url() == url('/admin/skills')) {{'active'}} @endif">
        <a class="nav-link" href="{{ route('skills.index') }}">
            <i class="fas fa-code-branch"></i>
            <span>Skills</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->url() == url('admin/services')) {{'active'}} @endif">
        <a class="nav-link" href="{{ route('services.index') }}">
            <i class="fas fa-phone-alt"></i>
            <span>Services</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->url() == url('admin/projects')) {{'active'}} @endif">
        <a class="nav-link" href="{{ route('projects.index') }}">
            <i class="fas fa-parking"></i>
            <span>Projects</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->url() == url('/admin/clients')) {{'active'}} @endif">
        <a class="nav-link" href="{{ route('clients.index') }}">
            <i class="fas fa-users"></i>
            <span>Clients</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->url() == url('admin/testimonials')) {{'active'}} @endif">
        <a class="nav-link" href="{{ route('testimonials.index') }}">
            <i class="fas fa-user-tag"></i>
            <span>Testimonials</span>
        </a>
    </li>
</ul>
