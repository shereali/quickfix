<template>
    <div>
        <form class="form" @submit.prevent="processData()">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card" style="margin-top:2%;">
                        <div class="card-header">
                            <h3 class="card-title">{{ cardTitle }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="">Zone Name</label>
                                        <input type="text" name="zone_name" v-model="inputData.zone_name"
                                            class="form-control" placeholder="Enter Zone Name">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Division</label>
                                        <input type="hidden" name="division_id" v-model="inputData.division_id">
                                       <v-select :options="divisions" :reduce="division => division.id" label="name" @input="onChangeDivision($event)" v-model="inputData.division_id" placeholder="Select Division"></v-select>
                                   </div>
                                    
                                    <div class="form-group">
                                        <label for="">Service Type</label>
                                        <input type="hidden" name="service_type_id" v-model="inputData.service_type_id">
                                       <v-select :options="service_types" :reduce="service_type => service_type.id" label="name" v-model="inputData.service_type_id" placeholder="Select Service Type"></v-select>
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
                                        <label for="">Charge</label>
                                        <input type="number" name="charge" v-model="inputData.charge"
                                            class="form-control" >

                                    </div>
                                    <div class="form-group">
                                        <label for="">Districts</label>
                                        <input type="hidden" name="district_id" v-model="inputData.district_id">
                                       <v-select :options="districts" :reduce="district => district.id" label="name" v-model="inputData.district_id" placeholder="Select District"></v-select>
                                   </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" v-model="inputData.description"
                                            class="form-control" cols="4" rows="4"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <input type="hidden" name="status" v-model="inputData.status">
                                       <v-select :options="status" :reduce="statu => statu.value" label="name" v-model="inputData.status" placeholder="Select Status"></v-select>
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
        mixins: [mixin],
     data(){
            return {
                status:[
                            {name:'Active',value:1},
                            {name:'Inactive',value:0}
                        ],
                divisions:[],
                districts:[],
                service_types:[],
            }
         },
        created() {

            this.generalApi = 'zone'
            this.backUrl = '/zone'
            this.cardTitle = this.isEdit ? 'Edit zone' : 'Add New zone'
             this.isFile = true 
             this.isImage = 'image'

            axios.get(this.url + '/api/'+this.generalApi)
                .then(res => {
                    console.log(res.data.divisions);
                    this.divisions = res.data.divisions
                    // this.districts = res.data.districts
                    this.service_types = res.data.service_types
                    
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
           
        }


    }

</script>
