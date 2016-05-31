<div class="left_col scroll-view">
  <div class="navbar nav_title">
    <a href="{{ route('backend.dashboard.index') }}" class="site_title">
      <span class="brand-logo">
        <img src="{{ config('theme.setting.brand_logo') }}" alt="Logo">
      </span>
      <span class="brand-logo-collapsed">
        <img src="{{ config('theme.setting.brand_logo_collapsed') }}" alt="Logo">
      </span>
      {{ isset($_user1) ? print_r($_user1,1) : '' }}
      <span class="brand-name">{{ config('theme.setting.brand_name') }}</span>
    </a>
  </div>

  <div class="clearfix"></div>
  @if(!empty($_user))
  <!-- menu profile quick info -->
  <div class="profile">
    <div class="profile_pic">
      <img src="{{ $_user->avatar }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{ $_user->full_name }}</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->
  @endif

  <br/>

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      {{--<h3>General</h3>--}}
      <h3>Menu</h3>
      <ul class="nav side-menu">
        <?php
          $___t= '_blank';
          $___p = 'http://localhost/smile.hoangnham.com/gentelella-master/production/';
        ?>
        @foreach($_sidebarMenu as $__item)
          {!! createMenuItemBackend($__item) !!}
        @endforeach
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>index.html">Dashboard</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>index2.html">Dashboard2</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>index3.html">Dashboard3</a>
            </li>
          </ul>
        </li>
        <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>form.html">General Form</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>form_advanced.html">Advanced Components</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>form_validation.html">Form Validation</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>form_wizards.html">Form Wizard</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>form_upload.html">Form Upload</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>form_buttons.html">Form Buttons</a>
            </li>
          </ul>
        </li>
        <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>general_elements.html">General Elements</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>media_gallery.html">Media Gallery</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>typography.html">Typography</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>icons.html">Icons</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>glyphicons.html">Glyphicons</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>widgets.html">Widgets</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>invoice.html">Invoice</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>inbox.html">Inbox</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>calendar.html">Calendar</a>
            </li>
          </ul>
        </li>
        <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>tables.html">Tables</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>tables_dynamic.html">Table Dynamic</a>
            </li>
          </ul>
        </li>
        <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>chartjs.html">Chart JS</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>chartjs2.html">Chart JS2</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>morisjs.html">Moris JS</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>echarts.html">ECharts </a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>other_charts.html">Other Charts </a>
            </li>
          </ul>
        </li>
        <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>fixed_sidebar.html">Fixed Sidebar</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="menu_section">
      <h3>Live On</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>e_commerce.html">E-commerce</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>projects.html">Projects</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>project_detail.html">Project Detail</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>contacts.html">Contacts</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>profile.html">Profile</a>
            </li>
          </ul>
        </li>
        <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>page_404.html">404 Error</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>page_500.html">500 Error</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>plain_page.html">Plain Page</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>login.html">Login Page</a>
            </li>
            <li><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>pricing_tables.html">Pricing Tables</a>
            </li>
          </ul>
        </li>
        <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#level1_1">Level One</a>
            <li><a>Level One<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a target="<?php echo $___t; ?>" href="<?php echo $___p; ?>level2.html">Level Two</a>
                </li>
                <li><a href="#level2_1">Level Two</a>
                </li>
                <li><a href="#level2_2">Level Two</a>
                </li>
              </ul>
            </li>
            <li><a href="#level1_2">Level One</a>
            </li>
          </ul>
        </li>
        <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span
                class="label label-success pull-right">Coming Soon</span></a>
        </li>
      </ul>
    </div>

  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- /menu footer buttons -->
</div>