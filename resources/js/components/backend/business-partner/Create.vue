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
                                    <input type="hidden" name="customer_id" v-model="inputData.customer_id">
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
                                    <input type="text" name="b_address" v-model="inputData.b_address" class="form-control" placeholder="Enter Address">  
                                </div>
                                <div class="form-group">
                                        <label for="">Division</label>
                                       <v-select :options="divisions" :reduce="division => division.id" label="name" @input="onChangeDivision($event)" v-model="inputData.b_division_id" placeholder="Select Division"></v-select>
                                       <input type="hidden" name="b_division_id" v-model="inputData.b_division_id">
                                   </div>
                                    <div class="form-group">
                                        <label for="">Districts</label>            
                                       <v-select :options="districts" :reduce="district => district.id" label="name" @input="onChangeDistrict($event)" v-model="inputData.b_district_id" placeholder="Select District"></v-select>
                                        <input type="hidden" name="b_district_id" v-model="inputData.b_district_id">
                                   </div>
                                <div class="form-group">
                                        <label for="">Zone</label>                                        
                                       <v-select :options="zones" :reduce="zone => zone.id" label="zone_name" v-model="inputData.b_zone_id" placeholder="Select Zone"></v-select>
                                       <input type="hidden" name="b_zone_id" v-model="inputData.b_zone_id">
                                   </div>
                                   <div class="form-group">
                                    <label for="">Device Functional Type</label>
                                    <v-select :options="device_functional_types" :reduce="device_functional_type => device_functional_type.id"  label="name" v-model="inputData.b_device_functional_type_id" placeholder="Select Device Functional Type"></v-select>
                                    <input type="hidden" name="b_device_functional_type_id" v-model="inputData.b_device_functional_type_id">
                                </div>  

                                <div class="form-group">
                                    <label for="">Work Experience</label>
                                    <v-select :options="work_experience" :reduce="work => work.id"  label="experience" v-model="inputData.b_work_experience_id" placeholder="Select Work Experience"></v-select>
                                    <input type="hidden" name="b_work_experience_id" v-model="inputData.b_work_experience_id">
                                </div>  
                                   <div class="form-group"> 
                                        <label for="">NID Photo</label>
                                        <input type="file" name="nid_image" class="form-control"> 
                                         <div v-if="isEdit" class="m-4">
                                            <img :src="inputData.image_path_nid" style="width:80px; height:80px;" class="img-fluid" alt="">
                                        </div> 
                                    </div>
                                   
                                   <div class="form-group"> 
                                        <label for="">Working Place Photo</label>
                                        <input type="file" name="image" class="form-control"> 
                                         <div v-if="isEdit" class="m-4">
                                            <img :src="url+'/images/work/'+inputData.working_place_image" style="width:80px; height:80px;" class="img-fluid" alt="">
                                        </div> 
                                    </div>
                                                        
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Contact Person Name </label>
                                    <input type="text" name="b_contact_person_name" v-model="inputData.b_contact_person_name" class="form-control" placeholder="Enter Contact Person Name">  
                                </div>
                                <div class="form-group">
                                    <label for=""> Contact Person Number </label>
                                    <input type="text" name="b_contact_person_number" v-model="inputData.b_contact_person_number" class="form-control" placeholder="Enter Contact Person Number">  
                                </div>
                                <div class="form-group">
                                    <label for=""> Designation </label>
                                    <input type="text" name="b_designation" v-model="inputData.b_designation" class="form-control" placeholder="Enter Designation">  
                                </div>
                                <div class="form-group">
                                    <label for=""> Web Address </label>
                                    <input type="text" name="b_web_address" v-model="inputData.b_web_address" class="form-control" placeholder="Enter Web Address">  
                                </div>
                                <div class="form-group">
                                    <label for=""> No of Employee </label>
                                    <input type="number" name="b_no_of_employee" v-model="inputData.b_no_of_employee" class="form-control" placeholder="">  
                                </div>
                                <div class="form-group">
                                    <label for=""> NID Number </label>
                                    <input type="text" name="b_nid_no" v-model="inputData.b_nid_no" class="form-control" placeholder="Enter NID number">  
                                </div>
                                <div class="form-group">
                                    <label for="">Device Type</label>
                                    <v-select :options="device_types" :reduce="device_type => device_type.id"  label="type_name" v-model="inputData.b_device_type_id" placeholder="Select Device Type"></v-select>
                                    <input type="hidden" name="b_device_type_id" v-model="inputData.b_device_type_id">
                                </div>  
                                
                                <div class="form-group">
                                    <label for="">Experience Category</label>
                                    <v-select :options="experience_category" :reduce="ex_category => ex_category.id"  label="title" v-model="inputData.b_experience_category_id" placeholder="Select Experience Category"></v-select>
                                    <input type="hidden" name="b_experience_category_id" v-model="inputData.b_experience_category_id">
                                </div>  
                                

                                 <div class="form-group">
                                    <label for="">Verify Status</label>
                                    <v-select :options="verify_status" :reduce="verify_statu => verify_statu.value"  label="name" v-model="inputData.verify_status" placeholder="Select Verify Status"></v-select>
                                    <input type="hidden" name="verify_status" v-model="inputData.verify_status">
                                </div>  
                                <div class="form-group"> 
                                        <label for="">Trade License</label>
                                        <input type="file" name="tradelicense_image" class="form-control"> 
                                         <div v-if="isEdit" class="m-4">
                                            <img :src="inputData.image_path_tradelicense" style="width:80px; height:80px;" class="img-fluid" alt="">
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
                divisions              : [],
                districts              : [],
                zones                  : [],
                device_types           : [],
                device_functional_types: [],
                work_experience        : [],
                experience_category    : [],
    }
},
created(){

    this.generalApi = 'business-partners'
    this.backUrl = '/business-partners'
    this.cardTitle = this.isEdit?'Edit Business Partner':'Add New Business Partner'   
    this.isFile = true 
    this.isImage = 'image_nid'
    this.isImage = 'image_tradelicense'
   
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
        this.divisions               = res.data.divisions
        this.device_types            = res.data.device_types
        this.device_functional_types = res.data.device_functional_types
        this.work_experience         = res.data.work_experience
        this.experience_category     = res.data.experience_category
     
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
