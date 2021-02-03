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
                                        <label for="">Brands </label>
                                        <input type="hidden" name="brand_id" v-model="inputData.brand_id">
                                       <v-select :options="brands" :reduce="brand => brand.id" label="brand_name" v-model="inputData.brand_id" placeholder="Select Brands"></v-select>
                                   </div>
                                    <div class="form-group">
                                        <label for="">Model Name</label>
                                        <input type="text" name="model_name" v-model="inputData.model_name"
                                            class="form-control" placeholder="Enter Model Name">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Model Number</label>
                                        <input type="text" name="model_number" v-model="inputData.model_number"
                                            class="form-control" placeholder="Enter Model Number">

                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" v-model="inputData.description"
                                            class="form-control" cols="4" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Photo</label>
                                        <input type="file" name="image" class="form-control">
                                         <div v-if="isEdit" class="m-4">
                                            <img :src="inputData.image_path" style="width:80px; height:80px;" class="img-fluid" alt="">
                                        </div> 
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
                brands:[],
            }
         },
        created() {

            this.generalApi = 'device-models'
            this.backUrl = '/device-models'
            this.cardTitle = this.isEdit ? 'Edit Device Model' : 'Add New Device Model'
             this.isFile = true 
             this.isImage = 'image'

            axios.get(this.url + '/api/'+this.generalApi)
                .then(res => {
                    // console.log(res.data.brands);
                    this.brands = res.data.brands
                    
                })

        },


    }

</script>
