<template>
      <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
       <img src="http://127.0.0.1:8000/dist/img/logo_dark.png" class="brand-image  elevation-3"
           alt="not found">
      <span class="brand-text font-weight-light" style="color:#343A40;">QuickFix</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://127.0.0.1:8000/dist/img/admin.png" class="brand-image img-circle elevation-3"
           style="opacity: .8" alt="not found">
        </div>
        <div class="info">
          <router-link to="/">
                Admin
          </router-link>
          <!-- <a href="#" class="d-block">Admin</a> -->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
           
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Role & Permission
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/module-register" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Module Register</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/roles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/permissions" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permission</p>
                </router-link>
              </li>
              <!-- <li class="nav-item">
                <router-link to="/assign-roles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Role</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/assign-permissions" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Permission</p>
                </router-link>
              </li> -->
            </ul>
          </li>
          <li class="nav-item">
              <router-link to="#" class="nav-link" @click.native="signOut">
                <i class="fa fa-sign-out-alt nav-icon"></i>
                <p>Sign Out</p>
              </router-link>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>
<script>
export default {
  props:['signOut']
}
</script>