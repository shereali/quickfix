<template>
    <div class="sidebar" :style="height">
        <ul class="main-menu">
            <!-- <li><i class="fa fa-user"></i> <router-link to="">Role & Permission <i class="fa fa-caret-right"></i></router-link>
                <ul class="dropdown">
                    <li><router-link to="/users">User</router-link></li>
                    <li><router-link to="/roles">Role</router-link></li>
                    <li><router-link to="/permissions">Permission</router-link></li>
                    <li><router-link to="/assign-roles">Assign Role</router-link></li>
                    <li><router-link to="/assign-permissions">Assign Permission</router-link></li>
                </ul>
            </li>
            <li><i class="fa fa-comment"></i> <router-link to="">Admin User</router-link></li> -->
            <li><i class="fa fa-call"></i> <router-link to="/instant-call">Instant Call</router-link></li>
            <li><i class="fa fa-quotation"></i> <router-link to="/quotation">Quotation</router-link></li>
            <!-- <li><i class="fa fa-shopping-cart"></i> <router-link to="">Merchants</router-link></li>
            <li><i class="fa fa-music" aria-hidden="true"></i> <router-link to="">Customer</router-link></li>
            <li><i class="fa fa-list"></i> <router-link to="/services">Service</router-link></li>
            <li><i class="fa fa-list"></i> <router-link to="/service-categories">Service Category</router-link></li>
            <li><i class="fa fa-product-hunt" aria-hidden="true"></i> <router-link to="/brands">Brands</router-link></li>
            <li><i class="fa fa-product-hunt" aria-hidden="true"></i> <router-link to="/device-models">Device Model</router-link></li>
            <li><i class="fa fa-product-hunt" aria-hidden="true"></i> <router-link to="/discounts">Discount</router-link></li> -->
            <li><i class="fa fa-sign-out"></i> <a href="javascript:void(0)" @click.prevent="signOut">Sign Out</a></li>
        </ul>
    </div>
</template>

<script>
import { log } from 'util'
export default {
    props:['signOut'],
    data(){
        return {
            height:''
        }
    },

    created(){
        this.height = 'height:'+screen.height+'px'

        console.log(screen.height);


        
    }
}
</script>