<template>
    <div>
        <form class="form" @submit.prevent="processData()">
            <div class="row" style="margin-top:5%;">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ cardTitle }}</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Device Type</label>
                                        <input type="hidden" name="device_model_id" v-model="inputData.device_model_id">
                                       <v-select :options="device_models" :reduce="device_model => device_model.id" label="model_name" v-model="inputData.device_model_id" placeholder="Select Device Model"></v-select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Problem Type Name</label>
                                        <input type="text" name="name" v-model="inputData.name" class="form-control" placeholder="Enter Problem Type Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control" v-model="inputData.description" cols="4" rows="4"></textarea>                                
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
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
mixins:[mixin], 
 data(){
            return {
                status:[
                    {name:'Active',value:1},
                    {name:'Inactive',value:0}
                ],
                device_models: [],
            }
        },
created(){

    this.generalApi = 'problem-type'
    this.backUrl = '/problem-type'
    this.cardTitle = this.isEdit?'Edit Problem Type':'Add New Problem Type' 
    this.isFile = true 
    this.isImage = 'image'
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
        console.log(res.data.device_models);
        this.device_models = res.data.device_models
    })

},


}

</script>
