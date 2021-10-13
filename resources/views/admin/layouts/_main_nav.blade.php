<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('dashboard.user')}}">
                    <i class="material-icons">person</i>
                    <p>User</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.index')}}">
                    <i class="material-icons">person</i>
                    <p>Admin</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">person</i>
                    <p>Category</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('tag.index')}}">
                    <i class="material-icons">person</i>
                    <p>Tag</p>
                </a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" href="{{route('logout')}}">
                    <i class="material-icons">person</i>
                    <p>Logout</p>
                </a>
            </li>

        </ul>
    </div>
</div>
