 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="index3.html" class="nav-link">Home</a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="#" class="nav-link">Contact</a>
         </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Navbar Search -->
         <li class="nav-item">
             <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                 <i class="fas fa-search"></i>
             </a>
             <div class="navbar-search-block">
                 <form class="form-inline">
                     <div class="input-group input-group-sm">
                         <input class="form-control form-control-navbar" type="search" placeholder="Search"
                             aria-label="Search">
                         <div class="input-group-append">
                             <button class="btn btn-navbar" type="submit">
                                 <i class="fas fa-search"></i>
                             </button>
                             <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                 <i class="fas fa-times"></i>
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt"></i>
             </a>
         </li>
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="far fa-user"></i>
             </a>
             <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                 <a href="" class="media-body">
                     <div class=" dropdown-item">
                         <a href="#" class="btn btn-default btn-flat">Profile</a>
                     </div>
                     <div class="dropdown-divider"></div>
                     <div class="dropdown-item btn btn-default pull-right">
                         <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Logout</a>
                     </div>
             </div>
             </a>
         </li>
         </div>
         </li>
     </ul>
 </nav>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <div class="sidebar">

         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
                 <a href="#" class="d-block">{{ Auth::guard('admin')->user()->email }}</a>

             </div>
         </div>

         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item menu-open">
                 <li class="nav-item">
                     <a href="{{ route('post.index') }}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Properties</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('agent.index') }}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Agents</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/category') }}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Locations</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/tenants') }}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Tenants</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/vacantrooms') }}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Vacant Rooms</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/damagedrooms') }}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Damaged Rooms</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/transactions') }}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Transactions</p>
                     </a>
                 </li>
                 </li>
             </ul>
         </nav>
     </div>
 </aside>
