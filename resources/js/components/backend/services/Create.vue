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
                                        <label for="">Name {{ inputData.name }}</label>
                                        <input type="text" name="name" v-model="inputData.name" class="form-control" placeholder="e.g. Mohammad Ali">
                                    </div>
                                
                                    <div class="form-group"> 
                                        <label for="">Photo</label>
                                        <input type="file" name="image" class="form-control">
                                        <div v-if="isEdit" class="m-4">
                                            <img :src="inputData.image_path" alt="">
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="service_description" class="form-control" v-model="inputData.service_description" cols="10" rows="10"></textarea>                                
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
created(){

    this.generalApi = 'services'
    this.backUrl = '/services'
    this.cardTitle = this.isEdit?'Edit Service':'Add New Service' 
    this.isFile = true 
    this.isImage = 'image'
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
        console.log(res.data.user_id);
        this.inputData.user_id = res.data.user_id
    })

},


}

</script>
