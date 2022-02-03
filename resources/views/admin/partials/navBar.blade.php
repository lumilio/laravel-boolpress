<nav id="sidebarMenu" class="col-md-3 col-lg-2 ">
    <div style='height:80vh; background-color:lightgrey' class="mt-3 pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/admin') }}">
                <span data-feather="home"></span>
                            Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.products.index')}}">
                <span data-feather="file"></span>
                            Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.posts.index')}}">
                <span data-feather="file"></span>
                            Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.categories.index')}}">
                <span data-feather="file"></span>
                            Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.tags.index')}}">
                <span data-feather="file"></span>
                            Tags
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.inbox.index')}}">
                <span data-feather="file"></span>
                            Inbox
                </a>
            </li>
        </ul>
    </div>
</nav>