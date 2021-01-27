<template>
<div>
<form class="form" @submit.prevent="processData()">
            <div class="row" >
                <div class="col-md-12 col-lg-12">
                    <div class="card" style="margin-top:2%;">
                        <div class="card-header">
                            <h3 class="card-title">{{ cardTitle }}</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Name </label>
                                    <input type="text" name="name" v-model="inputData.name" class="form-control" placeholder="Enter Name">  
                                </div>
                                <div class="form-group">
                                    <label for=""> Mobile {{inputData.mobile_number}} </label>
                                    <input type="text" name="mobile_number" v-model="inputData.mobile_number" class="form-control" placeholder="Enter Mobile Number">  
                                </div>
                                <div class="form-group">
                                    <label for=""> Email </label>
                                    <input type="email" name="email" v-model="inputData.email" class="form-control" placeholder="Enter Email">  
                                </div>
                                                        
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="">Verify Status</label>
                                    <v-select :options="verify_status" :reduce="verify_statu => verify_statu.value"  label="name" v-model="inputData.verify_status" placeholder="Select Verify Status"></v-select>
                                    <input type="hidden" name="verify_status" v-model="inputData.verify_status">
                                </div>  
                                
                            <div class="form-group"> 
                                        <label for="">Photo</label>
                                        <input type="file" name="image" class="form-control"> 
                                         <div v-if="isEdit" class="m-4">
                                            <img :src="inputData.image_path" style="width:80px; height:80px;" class="img-fluid" alt="">
                                        </div> 
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
import mixin from '../../../src/mixin';
export default {
mixins:[mixin], 
data(){
    return {
        status:[
                    {name:'Active',value:1},
                    {name:'Inactive',value:0}
                ],
          verify_status:[
                    {name:'Verified',value:1},
                    {name:'Not Verified',value:0}
                ],
    }
},
created(){

    this.generalApi = 'customers'
    this.backUrl = '/customers'
    this.cardTitle = this.isEdit?'Edit Customer':'Add New Customer'   
     this.isFile = true 
    this.isImage = 'image'
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
       
    })

},


}

</script>
