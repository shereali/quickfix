<template>
      <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Customer Support</span>
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
          <a href="#" class="d-block">Mr. Assistant</a>
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
                Dropdown
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>

            </ul>

          </li>

          <li class="nav-item">
              <router-link class="nav-link" to="/call-request">
              <i class="fas fa-phone-volume nav-icon" aria-hidden="true"></i>
                <p>Call Request</p>
              </router-link>
            </li>
           
            <li class="nav-item">
              <router-link class="nav-link" to="/customers">
                <i class="fab fa-intercom nav-icon" aria-hidden="true"></i>
                <p>Customer</p>
              </router-link>
            </li>
            <li class="nav-item"> 
              <router-link class="nav-link" to="/corporate-clients">
                <i class="far fa-user-circle nav-icon" aria-hidden="true"></i>
                <p>Corporate Client</p>
              </router-link>
            </li>

            <li class="nav-item">
               <router-link class="nav-link" to="/business-partners">
                  <i class="far fa-handshake nav-icon" aria-hidden="true"></i>
                <p>Business Partner</p>
              </router-link>
            </li> 
            <li class="nav-item">
               <router-link class="nav-link" to="/business-partners">
                 <i class="fas fa-truck-pickup nav-icon" aria-hidden="true"></i>
                <p>Assign Pickup/Orders</p>
              </router-link>
            </li> 
            <li class="nav-item">
               <router-link class="nav-link" to="/business-partners">
                <i class="fas fa-truck-loading nav-icon" aria-hidden="true"></i>
                <p>Assign Delivery Orders</p>
              </router-link>
            </li> 
            <li class="nav-item">
               <router-link class="nav-link" to="/business-partners">
                 <i class="fas fa-undo nav-icon" aria-hidden="true"></i>
                <p>Assign Return Orders</p>
              </router-link>
            </li> 
            <li class="nav-item">
               <router-link class="nav-link" to="/business-partners">
                <i class="fas fa-poll nav-icon" aria-hidden="true"></i>
                <p>Merchant Request</p>
              </router-link>
            </li> 
            <li class="nav-item">
               <router-link class="nav-link" to="/business-partners">
               <i class="fas fa-snowflake nav-icon" aria-hidden="true"></i>
                <p>Premises Service Request</p>
              </router-link>
            </li> 
            <li class="nav-item">
               <router-link class="nav-link" to="/business-partners">
                <i class="fas fa-home nav-icon" aria-hidden="true"></i>
                <p>Home Service Request</p>
              </router-link>
            </li> 
          
          <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" @click.prevent="signOut">
                  <i class="fa fa-sign-out-alt nav-icon"></i>
                  <p>Sign Out</p>
                </a>
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
