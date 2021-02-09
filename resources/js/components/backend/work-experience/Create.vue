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
                                        <label for="">Title</label>
                                        <input type="text" name="title" v-model="inputData.title"
                                            class="form-control" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" v-model="inputData.description"
                                            class="form-control" cols="2" rows="2"></textarea>
                                    </div>
                                    
                                                                 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Experience</label>
                                        <input type="text" name="experience" v-model="inputData.experience"
                                            class="form-control" placeholder="Enter Experience">
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
             
            }
         },
        created() {

            this.generalApi = 'work-experience'
            this.backUrl = '/work-experience'
            this.cardTitle = this.isEdit ? 'Edit Work Experience' : 'Add New Work Experience'
             this.isFile = true 
             this.isImage = 'image'

            axios.get(this.url + '/api/'+this.generalApi)
                .then(res => {
                    // console.log(res.data.brands);
               
                })

        },


    }

</script>
