<template>
    <div>
        <navbar v-if="showSidebar"></navbar>
        <sidebar v-if="showSidebar" :signOut="signOut"></sidebar>
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
      showSidebar:true
    }
  },

  created(){
    if(this.$route.name == 'SignIn'){
      this.showSidebar = false
    }
  },
    methods:{
    signOut(){
      this.$store.dispatch('signOut')
    }
  }
}
</script>