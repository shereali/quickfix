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
                                        <label for="">Division</label>
                                        <input type="hidden" name="division_id" v-model="inputData.division_id">
                                       <v-select :options="divisions" :reduce="division => division.id" label="name" @input="onChangeDivision($event)" v-model="inputData.division_id" placeholder="Select Division"></v-select>
                                   </div>
                                <div class="form-group">
                                        <label for="">Zone</label>
                                        <input type="hidden" name="zone_id" v-model="inputData.zone_id">
                                       <v-select :options="zones" :reduce="zone => zone.id" label="zone_name" v-model="inputData.zone_id" placeholder="Select Zone"></v-select>
                                   </div>
                                   <div class="form-group"> 
                                        <label for="">Photo</label>
                                        <input type="file" name="image" class="form-control"> 
                                         <div v-if="isEdit" class="m-4">
                                            <img :src="inputData.image_path" style="width:80px; height:80px;" class="img-fluid" alt="">
                                        </div> 
                             </div>
                                                        
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Mobile</label>
                                    <input type="text" name="mobile_number" v-model="inputData.mobile_number" class="form-control" placeholder="Enter Mobile Number">  
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" v-model="inputData.address" class="form-control" placeholder="Enter Address">  
                                </div>
                                <div class="form-group">
                                        <label for="">Districts</label>
                                        <input type="hidden" name="district_id" v-model="inputData.district_id">
                                       <v-select :options="districts" :reduce="district => district.id" label="name" @input="onChangeDistrict($event)" v-model="inputData.district_id" placeholder="Select District"></v-select>
                                   </div>
                                 <div class="form-group">
                                    <label for="">Verify Status</label>
                                    <v-select :options="verify_status" :reduce="verify_statu => verify_statu.value"  label="name" v-model="inputData.verify_status" placeholder="Select Verify Status"></v-select>
                                    <input type="hidden" name="verify_status" v-model="inputData.verify_status">
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
                 divisions:[],
                districts:[],
                zones: [],
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
        this.divisions = res.data.divisions
        // this.districts = res.data.districts
        // this.zones     = res.data.zones
       
    })

},
 methods:{
            onChangeDivision(name){
               
               axios.post(this.url+'/api/divisions-wise-districts', {name:name})
               .then(res => {
                   console.log(res.data);
                   this.districts = res.data
               })
            },
            onChangeDistrict(name){
                axios.post(this.url+'/api/districts-wise-zone', {name:name})
               .then(res => {
                   this.zones = res.data
               })
            }
        }


}

</script>
