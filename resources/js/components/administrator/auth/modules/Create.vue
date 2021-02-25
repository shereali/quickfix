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
                                <label for="">Describe Name</label>
                                <input type="text" name="describe_name" v-model="inputData.describe_name" class="form-control" placeholder="e.g. Customer Order">
                                
                            </div>
                            <div class="form-group">
                                <label for="">Model Name</label>
                                <input type="text" name="resource_name" v-model="inputData.resource_name" class="form-control" placeholder="CustomerOrder">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="text" name="mobile_no" v-model="inputData.mobile_no" class="form-control" placeholder="e.g. 01749xxxxxx">
                                
                            </div> -->
                          
                            <div class="form-group">
                                <label><input type="checkbox" name="read" v-model="inputData.read" :value="inputData.read"> Read </label>
                                <label><input type="checkbox" name="write" v-model="inputData.write" :value="inputData.write"> Write </label>
                                <label><input type="checkbox" name="update" v-model="inputData.update" :value="inputData.update"> Update </label>
                                <label><input type="checkbox" name="delete" v-model="inputData.delete" :value="inputData.delete"> Delete </label>
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

    this.generalApi = 'module-register'
    this.backUrl = '/module-register'
    this.cardTitle = this.isEdit?'Edit User':'Add New User'   
    
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
        
        this.roles = res.data.roles
       
    })

},


}

</script>
