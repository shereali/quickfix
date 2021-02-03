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
                                    <label for=""> Mobile</label>
                                    <input type="text" name="mobile_number" v-model="inputData.mobile_number" class="form-control" placeholder="Enter Mobile Number">  
                                </div>
                                
                                <div class="form-group">
                                    <label for=""> Email </label>
                                    <input type="email" name="email" v-model="inputData.email" class="form-control" placeholder="Enter Email">  
                                </div>
                                <div class="form-group">
                                    <label for=""> Address</label>
                                    <input type="text" name="address" v-model="inputData.address" class="form-control" placeholder="Enter Address">  
                                </div>
                                <div class="form-group">
                                        <label for="">Division</label>
                                        <input type="hidden" name="division_id" v-model="inputData.division_id">
                                       <v-select :options="divisions" :reduce="division => division.id" label="name" @input="onChangeDivision($event)" v-model="inputData.division_id" placeholder="Select Division"></v-select>
                                   </div>
                                    <div class="form-group">
                                        <label for="">Districts</label>
                                        <input type="hidden" name="district_id" v-model="inputData.district_id">
                                       <v-select :options="districts" :reduce="district => district.id" label="name" @input="onChangeDistrict($event)" v-model="inputData.district_id" placeholder="Select District"></v-select>
                                   </div>
                                <div class="form-group">
                                        <label for="">Zone</label>
                                        <input type="hidden" name="zone_id" v-model="inputData.zone_id">
                                       <v-select :options="zones" :reduce="zone => zone.id" label="zone_name" v-model="inputData.zone_id" placeholder="Select Zone"></v-select>
                                   </div>
                                   <div class="form-group"> 
                                        <label for="">Logo</label>
                                        <input type="file" name="image" class="form-control"> 
                                         <div v-if="isEdit" class="m-4">
                                            <img :src="inputData.image_path" style="width:80px; height:80px;" class="img-fluid" alt="">
                                   </div> 
                             </div>
                                                        
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Contact Person Name </label>
                                    <input type="text" name="contact_person_name" v-model="inputData.contact_person_name" class="form-control" placeholder="Enter Contact Person Name">  
                                </div>
                                <div class="form-group">
                                    <label for=""> Contact Person Number </label>
                                    <input type="text" name="contact_person_number" v-model="inputData.contact_person_number" class="form-control" placeholder="Enter Contact Person Number">  
                                </div>
                                <div class="form-group">
                                    <label for=""> Designation </label>
                                    <input type="text" name="designation" v-model="inputData.designation" class="form-control" placeholder="Enter Designation">  
                                </div>
                                <div class="form-group">
                                    <label for=""> Web Address </label>
                                    <input type="text" name="web_address" v-model="inputData.web_address" class="form-control" placeholder="Enter Web Address">  
                                </div>
                                <div class="form-group">
                                    <label for=""> No of Employee </label>
                                    <input type="number" name="no_of_employee" v-model="inputData.no_of_employee" class="form-control" placeholder="">  
                                </div>
                                <div class="form-group">
                                    <label for="">Support Type</label>
                                    <v-select :options="supports" :reduce="support => support.value"  label="name" v-model="inputData.support_type" placeholder="Select Support Type"></v-select>
                                    <input type="hidden" name="support_type" v-model="inputData.support_type">
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
          supports:[
                    {name:'Emergency Service',value:1},
                    {name:'Regular Service',value:2}
                ],
                 divisions:[],
                districts:[],
                zones: [],
    }
},
created(){

    this.generalApi = 'corporate-clients'
    this.backUrl = '/corporate-clients'
    this.cardTitle = this.isEdit?'Edit Corporate Client':'Add New Corporate Client'   
     this.isFile = true 
    this.isImage = 'image'
   
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
        this.divisions = res.data.divisions
        // this.districts = res.data.districts
        // this.zones     = res.data.zones
        console.log(res.data);
    
       
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
