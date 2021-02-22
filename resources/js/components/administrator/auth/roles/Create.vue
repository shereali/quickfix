<template>
    <div class="py-5">
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
                                </div>
                           </div>
                            <div class="form-group row">
                                <ul v-for="permission in permissions" :key="permission.id"  :class="permissions.length > 4?'col-md-6 float-right':'col-md-12'" class="list-group" v-if="isEdit">
                                    <li  class="list-group-item">
                                    <input  type="checkbox" :id="permission.id" name="permission[]"  :value="permission.id" v-model="inputData.editPermissions"> 

                                        {{ permission.name }}  

                                    </li> 
                                </ul> 
                                 <ul v-for="prm in prms" :key="prm.id"  :class="permissions.length > 4?'col-md-6 float-right':'col-md-12'" class="list-group" v-if="isEdit == false">
                                    <li  class="list-group-item">
                                    <input  type="checkbox" :id="prm.id" name="permission[]"  :value="prm.id"> 
                                    
                                        {{ prm.name }}  

                                    </li> 
                                   
                                </ul> 

                            </div>
                          
                            </div>
                           </div>
                        </div>
                        <div class="card-footer row">
                            <FormButton class="col-md-12" :isEdit="isEdit" :backUrl="backUrl"></FormButton>
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
        permissions:[],
        prms:[],
        checkedFilters:[],
        editPrm:[]

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
            this.prms = res.data.permissions 
        })
    }
}


}

</script>
