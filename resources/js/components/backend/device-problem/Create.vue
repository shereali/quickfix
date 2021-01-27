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
                                        <label for="">Device</label>
                                        <input type="hidden" name="device_id" v-model="inputData.device_id">
                                       <v-select :options="devices" :reduce="device => device.id" label="device_name" v-model="inputData.device_id" placeholder="Select Device"></v-select>
                                   </div>
                                    <div class="form-group">
                                        <label for="">Device Functional Type</label>
                                        <input type="hidden" name="device_functional_type_id" v-model="inputData.device_functional_type_id">
                                       <v-select :options="device_functional_types" :reduce="device_functional_type => device_functional_type.id" label="name" v-model="inputData.device_functional_type_id" placeholder="Select Functional Type"></v-select>
                                   </div>
                                    <div class="form-group">
                                        <label for="">Service Type</label>
                                        <input type="hidden" name="service_type_id" v-model="inputData.service_type_id">
                                       <v-select :options="service_types" :reduce="service_type => service_type.id" label="name" v-model="inputData.service_type_id" placeholder="Select Service Type"></v-select>
                                   </div>
                                    <div class="form-group">
                                        <label for="">Brands</label>
                                        <input type="hidden" name="brand_id" v-model="inputData.brand_id">
                                       <v-select :options="brands" :reduce="brand => brand.id" label="brand_name" v-model="inputData.brand_id" placeholder="Select Brand"></v-select>
                                   </div>
                                    <div class="form-group">
                                        <label for="">Device Models</label>
                                        <input type="hidden" name="device_model_id" v-model="inputData.device_model_id">
                                       <v-select :options="device_models" :reduce="device_model => device_model.id" label="model_number" v-model="inputData.device_model_id" placeholder="Select Device Model"></v-select>
                                   </div>
                                    <div class="form-group">
                                        <label for="">Problem Type</label>
                                        <input type="hidden" name="problem_type_id" v-model="inputData.problem_type_id">
                                       <v-select :options="problem_types" :reduce="problem_type => problem_type.id" label="name" v-model="inputData.problem_type_id" placeholder="Select Problem"></v-select>
                                   </div>        
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Problem</label>
                                        <input type="text" name="problem" v-model="inputData.problem"
                                            class="form-control" placeholder="Enter Problem">

                                    </div> 
                                    <div class="form-group">
                                        <label for="">Original Price</label>
                                        <input type="number" name="original_price" v-model="inputData.original_price"
                                            class="form-control" placeholder="">

                                    </div> 
                                    <div class="form-group">
                                        <label for="">Master Copy Price</label>
                                        <input type="number" name="master_copy_price" v-model="inputData.master_copy_price"
                                            class="form-control" placeholder="">

                                    </div> 
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" v-model="inputData.description"
                                            class="form-control" cols="2" rows="2"></textarea>
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
                devices:[],
                device_functional_types:[],
                service_types:[],
                brands:[],
                device_models:[],
                problem_types:[],
            }
         },
        created() {

            this.generalApi = 'device-problems'
            this.backUrl = '/device-problems'
            this.cardTitle = this.isEdit ? 'Edit Device Problem' : 'Add New Device Problem'
             this.isFile = true 
             this.isImage = 'image'

            axios.get(this.url + '/api/'+this.generalApi)
                .then(res => {
                    // console.log(res.data.brands);
                    this.devices                 = res.data.devices
                    this.device_functional_types = res.data.device_functional_types
                    this.service_types           = res.data.service_types
                    this.brands                  = res.data.brands
                    this.device_models           = res.data.device_models
                    this.problem_types           = res.data.problem_types
                    
                })

        },


    }

</script>
