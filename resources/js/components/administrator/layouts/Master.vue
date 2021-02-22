<template>
    <div v-if="user.role == 'Administrator'">
        <navbar v-if="isNavbar"></navbar>
        <sidebar v-if="isSidebar" :signOut="signOut"></sidebar>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
                <router-view key="this.$router.fullPath"></router-view>
            </div>
          </section>
        </div>
    </div>
    <div class="py-5" v-else>
        <h1 class="text-danger text-center">Access Denied!</h1>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
export default {
  data(){
    return {
      isSidebar:true,
      isNavbar:true,
    }
  },

  created(){
    if(this.$route.name == 'SignIn'){
      this.isSidebar = false
      this.isNavbar = false
      $(document).find('body').css('background', '#F4F6F9')

    }
  },
    methods:{
    signOut(){
      this.$store.dispatch('signOut')
    }
  },
  computed:{
    ...mapGetters({
      user:'user'
    })
  }
}
</script>