  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/dist/img/user.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php $page = $this->uri->segment(1); ?>
        <li<?=(strtolower($page) == 'posts') ? ' class="active"' : '';?>>
          <a href="<?=base_url('posts');?>">
            <i class="fa fa-file-text"></i> <span>Posts</span>
            <span class="pull-right-container">
              <small class="label pull-right label-primary">0</small>
            </span>
          </a>
        </li>
        <li<?=(strtolower($page) == 'pages') ? ' class="active"' : '';?>>
          <a href="<?=base_url('pages');?>">
            <i class="fa fa-file"></i> <span>Pages</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-teal">80%</small>
            </span>
          </a>
        </li>
        <li<?=(strtolower($page) == 'categories') ? ' class="active"' : '';?>>
          <a href="<?=base_url('categories');?>">
            <i class="fa fa-th-large"></i> <span>Categories</span>
            <span class="pull-right-container">
              <small class="label pull-right label-warning">OK</small>
            </span>
          </a>
        </li>
        <li<?=(strtolower($page) == 'media') ? ' class="active"' : '';?>>
          <a href="<?=base_url('media');?>">
            <i class="fa <?=(strtolower($page) == 'media') ? ' fa-folder-open' : 'fa-folder';?>"></i> <span>Media</span>
            <span class="pull-right-container">
              <small class="label pull-right label-danger">0</small>
            </span>
          </a>
        </li>
        <li<?=(strtolower($page) == 'users') ? ' class="active"' : '';?>>
          <a href="<?=base_url('users');?>">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-purple">65%</small>
            </span>
          </a>
        </li>
        <li<?=(strtolower($page) == 'setting') ? ' class="active"' : '';?>>
          <a href="<?=base_url('setting');?>">
            <i class="fa fa-dashboard"></i> <span>Setting</span>
            <span class="pull-right-container">
              <small class="label pull-right label-success">0%</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Menu v2</a></li>
          </ul>
        </li>
        <li class="header"><i class="fa fa-dashboard"></i> Page rendered in <strong>{elapsed_time}</strong> second</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>