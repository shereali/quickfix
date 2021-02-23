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
                                        <label for="">Service Type</label>
                                        <input type="text" name="name" v-model="inputData.name" class="form-control" placeholder="Enter Service Type">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control" v-model="inputData.description" cols="2" rows="2"></textarea>                                
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
            }
        },
created(){

    this.generalApi = 'service-type'
    this.backUrl = '/service-type'
    this.cardTitle = this.isEdit?'Edit Service Type':'Add New Service Type' 
    this.isFile = true 
    this.isImage = 'image'
    
    // axios.get(this.url+'/api/'+this.generalApi)
    // .then(res => {
    //     console.log(res.data.deviceTypes);
    //     this.deviceTypes = res.data.deviceTypes
    // })

},


}

</script>
