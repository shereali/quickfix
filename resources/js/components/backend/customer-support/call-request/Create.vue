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
                                    <label for=""> Email </label>
                                    <input type="email" name="email" v-model="inputData.email" class="form-control" placeholder="Enter Email">  
                                </div>
                                <div class="form-group">
                                    <label for="">Job Status</label>
                                    <v-select :options="job_status" :reduce="job_statu => job_statu.value"  label="name" @input="showHide($event)" v-model="inputData.job_status" placeholder="Select Job Status"></v-select>
                                    <input type="hidden" name="job_status" v-model="inputData.job_status">
                                </div>  

                                <div class="form-group" v-if="showJob">
                                    <label for=""> Job Form </label>
                                    <input type="text" name="taka" v-model="inputData.taka" class="form-control" placeholder="Enter Taka">  
                                </div>
                                
                                
                                                    
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for=""> Mobile</label>
                                    <input type="text" name="mobile_number" v-model="inputData.mobile_number" class="form-control" placeholder="Enter Mobile Number">  
                                </div>
                                                       
                                 <div class="form-group">
                                    <label for="">Call  Status</label>
                                    <v-select :options="instant_call_status" :reduce="instant_call_statu => instant_call_statu.id"  label="status_name" v-model="inputData.status" placeholder="Select Call Status"></v-select>
                                    <input type="hidden" name="status" v-model="inputData.status">
                                </div>  
                                <div class="form-group">
                                        <label for="">Remarks</label>
                                        <textarea name="remarks" class="form-control" v-model="inputData.remarks" cols="2" rows="2"></textarea>                                
                                </div>
                                <div class="form-group" v-if="showJob">
                                    <label for=""> Job Form </label>
                                    <input type="text" name="taka" v-model="inputData.taka" class="form-control" placeholder="Enter Taka">  
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
        job_status:[
                    {name:'Yes',value:1},
                    {name:'No',value:0}
                ],
         instant_call_status: [],
         showJob: false,
         
               
    }
},
created(){

    this.generalApi = 'call-request'
    this.backUrl = '/call-request'
    this.cardTitle = this.isEdit?'Edit Call Request':'Add New Call Request'   
     this.isFile = true 
    this.isImage = 'image'
   
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
        this.instant_call_status = res.data.instant_call_status
        // this.districts = res.data.districts
        // this.zones     = res.data.zones
        console.log(res.data);
    
       
    })


},
 methods:{
            showHide(name){
               
               if(name == 1){
                   this.showJob = true
               }
               else{
                    this.showJob = false
               }
            },
            // onChangeDistrict(name){
            //     axios.post(this.url+'/api/districts-wise-zone', {name:name})
            //    .then(res => {
            //        this.zones = res.data
            //    })
            // }
        }


}

</script>
