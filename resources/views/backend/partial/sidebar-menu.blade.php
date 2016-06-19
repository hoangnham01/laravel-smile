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