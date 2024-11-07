<!-- Sidebar Navigation -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
@if(auth()->user() )
<li class="nav-item">
    <a href="{{ route('posts.index') }}" class="nav-link {{ Request::is('posts') ? 'active' : '' }}">
        <i class="nav-icon fas fa-pen"></i>
        <p>Blogs</p>
    </a>
</li>
@endif

@if(auth()->user() && auth()->user()->role === 'admin') <!-- Check if the user is authenticated and has an admin role -->
    <li class="nav-item">
        <a href="{{ route('admin.pendingBlogs') }}" class="nav-link {{ Request::is('admin/pending-blogs') ? 'active' : '' }}">
            <i class="nav-icon fas fa-check-circle"></i>
            <p>Blog Approval</p>
        </a>
    </li>
@endif
