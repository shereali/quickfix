<template>
      <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mr. Admin</a>
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
              <li class="nav-item">
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
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Back Office Setup
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/device-types" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Device Type</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/device" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Device</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/device-functional-type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Device Functional Type</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/service-type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Type</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/problem-type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Problem Type</p>
                </router-link>
              </li>
             <li class="nav-item">
               <router-link class="nav-link" to="/zone">
                <i class="far fa-circle nav-icon"></i>
                <p>Zone</p>
               </router-link>
            </li>
             <li class="nav-item">
               <router-link class="nav-link" to="/work-experience">
                <i class="far fa-circle nav-icon"></i>
                <p>Work Experience</p>
               </router-link>
            </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
              <li><i class="fa fa-sign-out"></i> <a href="javascript:void(0)" @click.prevent="signOut">Sign Out</a></li>
            </ul>
          </li> -->

            <li class="nav-item">
              <router-link class="nav-link" to="/brands">
            <i class="nav-icon fab fa-bandcamp" aria-hidden="true"></i>
            <p>Brands</p>
            </router-link>
            </li>
            <li class="nav-item"><router-link class="nav-link" to="/device-models">
            <i class="nav-icon fab fa-apple" aria-hidden="true"></i>
            <p>Device Model</p></router-link></li>
            <li class="nav-item"><router-link class="nav-link" to="/device-problems">
            <i class="nav-icon fas fa-exclamation-triangle" aria-hidden="true"></i>
            <p>Device Problem</p></router-link></li>
            <li class="nav-item"><router-link class="nav-link" to="/experience-category">
            <i class="nav-icon fas fa-flask" aria-hidden="true"></i>
            <p>Experience Category</p></router-link></li>
            

            <li class="nav-item"> <router-link class="nav-link" to="/instant-call"><i class="fas fa-headset nav-icon"></i>
            <p>Instant Call</p></router-link></li>
            <!-- <li class="nav-item"> <router-link class="nav-link" to="/quotation"><i class="far fa-question-circle nav-icon"></i>
            <p>Quotation</p></router-link></li>
            <li class="nav-item"> <router-link class="nav-link" to=""><i class="fa fa-shopping-cart nav-icon"></i>
            <p>Merchants</p></router-link></li> -->
            <li class="nav-item"> <router-link class="nav-link" to="/customers"><i class="fab fa-intercom nav-icon" aria-hidden="true"></i>
            <p>Customer</p></router-link></li>
            
            <li class="nav-item"> <router-link class="nav-link" to="/corporate-clients"><i class="far fa-user-circle nav-icon" aria-hidden="true"></i>
            <p>Corporate Client</p></router-link></li>

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Discounts & Bonus
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/bonus" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Bonus</p>
                </router-link>
              </li>  
               <li class="nav-item">
              <router-link class="nav-link" to="/discounts">
                <i class="far fa-circle nav-icon"></i>
                <p>Discount</p>
             </router-link>
            </li>            
            </ul>
          </li>


            <!-- <li class="nav-item"> <router-link class="nav-link" to="/services">
            <i class="fa fa-list nav-icon"></i><p>Service</p></router-link></li>
            <li class="nav-item"> <router-link class="nav-link" to="/service-categories">
            <i class="fa fa-list nav-icon"></i>
            <p>Service Category</p></router-link></li>             -->
           

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