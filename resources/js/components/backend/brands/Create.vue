<template>
<div>
<form class="form" @submit.prevent="processData()">
            <div class="row" style="margin-top:-20px;">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ cardTitle }}</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Service Category</label>
                                    <v-select :options="service_categories" :reduce="category => category.id"  label="name" v-model="inputData.name"></v-select>
                                    <input type="hidden" name="name" v-model="inputData.name">
                                </div>
                                <div class="form-group">
                                    <label for="">Name {{ inputData.brand_name }}</label>
                                    <input type="text" name="brand_name" v-model="inputData.brand_name" class="form-control" placeholder="e.g. Shere Ali">  
                                </div>
                            
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="brand_description" v-model="inputData.brand_description" id="" class="form-control" cols="5" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input type="file" name="image" class="form-control">
                                 <div v-if="isEdit" class="m-4">
                                            <img :src="inputData.image_path" alt="">
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
        service_categories:[],
    }
},
created(){

    this.generalApi = 'brands'
    this.backUrl = '/brands'
    this.cardTitle = this.isEdit?'Edit Brand':'Add New Brand'   
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
        console.log(res.data.service_categories);
        this.service_categories = res.data.service_categories
    })

},


}

</script>
