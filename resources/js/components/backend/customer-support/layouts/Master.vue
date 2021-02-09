<template>
    <div>
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
</template>

<script>
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
      // this.$elm('.content-wrapper').css({'background':'#F4F6F9'})
      // console.log(this.$el);
      $(document).find('body').css('background', '#F4F6F9')
      
    }
  },
    methods:{
    signOut(){
      this.$store.dispatch('signOut')
    }
  }
}
</script>