<template>
    <div>
        <form class="form" @submit.prevent="processData()">
            <div class="row" style="margin-top:-20px;">
                <div class="col-md-12 col-lg-12">
                    <div class="card m-5">
                        <div class="card-header">
                            <h3 class="card-title">{{ cardTitle }}</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                <label for="">Name {{ inputData.name }}</label>
                                <input type="text" name="name" v-model="inputData.name" class="form-control" placeholder="e.g. Mohammad Ali">
                                
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" v-model="inputData.password" class="form-control" placeholder="********">
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <v-select :options="roles" :reduce="role => role.id" label="name"  name="roles" v-model="inputData.roles" placeholder="Select Role"></v-select>
                                <input type="hidden" name="roles" v-model="inputData.roles">
                            </div>
                           
                            <!-- <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="text" name="mobile_no" v-model="inputData.mobile_no" class="form-control" placeholder="e.g. 01749xxxxxx">
                                
                            </div> -->
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" v-model="inputData.email" class="form-control" placeholder="e.g. mohammadali@mail.com">    
                            </div>
                            

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="confirm_password" v-model="inputData.confirm_password" class="form-control" placeholder="********">
                            </div>
                            </div>
                           </div>
                        </div>
                        <div class="card-footer">
                            <FormButton :isEdit="isEdit" :backUrl="backUrl"></FormButton>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</template>

<script>
import mixin from '../../../../src/mixin';
export default {
mixins:[mixin], 
data(){
    return {
        roles:[]
    }
},
created(){

    this.generalApi = 'users'
    this.backUrl = '/users'
    this.cardTitle = this.isEdit?'Edit User':'Add New User'   
    
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
        this.roles = res.data.roles
       
    })

},


}

</script>
