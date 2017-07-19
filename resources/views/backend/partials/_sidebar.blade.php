<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="font-weight: normal;">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header text-center">QUICK LINKS</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ Request::is('/dashboard' ? "active" : "") }}"><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="{{ Request::is('/profile' ? "active" : "") }}"><a href="{{ url('/profile') }}"><i class="fa fa-eye"></i> <span>View profile</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-sticky-note"></i> <span>Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('posts.create') }}"><i class="fa fa-plus"></i><span>New post</span></a></li>
            <li><a href="{{ route('posts.index') }}"><i class="fa fa-briefcase"></i>My Posts</a></li>
            <li><a href="#"><i class="fa fa-thumbs-up"></i>Liked Posts</a></li>
            <li><a href="#"><i class="fa fa-pie-chart"></i>Summary</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-envelope"></i> <span>Send Message</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-gears"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-home"></i>Go to frontend</a></li>
            <li><a href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>