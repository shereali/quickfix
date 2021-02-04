<template>
    <div>
        <form class="form" @submit.prevent="processData()">
            <div class="row" style="margin-top:-20px;">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ cardTitle }}</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name"  class="form-control" v-model="inputData.name" placeholder="Enter Role">
                                
                            </div>
                            <div class="form-group" v-for="(permission, index) in permissions" :key="index">
                                <input  type="checkbox" name="permission[]" :value="permission.id">
                                <label for="">{{ permission.name }}</label>
                                
                              
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
        permissions:[]
    }
},
watch:{
    permissions:function(value){
        this.permissions = value
    }
},
created(){

    this.generalApi = 'roles'
    this.backUrl = '/roles'
    this.cardTitle = this.isEdit?'Edit Role':'Add New Role'  
    this.isFile = true
    this.getPermission(); 
},
methods:{
    getPermission(){
        axios.get(this.url+'/api/'+this.generalApi)
        .then(res => {
            
            this.permissions = res.data.permissions  
            console.log('res.data.permissions', res.data.permissions);
        })
    }
}


}

</script>
