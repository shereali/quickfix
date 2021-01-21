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
                                        <label for="">Name</label>
                                        <input type="text" name="model_name" v-model="inputData.model_name"
                                            class="form-control" placeholder="">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Model Number</label>
                                        <input type="text" name="model_number" v-model="inputData.model_number"
                                            class="form-control" placeholder="">

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
                                        <textarea name="model_description" v-model="inputData.model_description"
                                            class="form-control" cols="10" rows="5"></textarea>
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
        created() {

            this.generalApi = 'device-models'
            this.backUrl = '/device-models'
            this.cardTitle = this.isEdit ? 'Edit Device Model' : 'Add New Device Model'

            axios.get(this.url + '/api/' + this.generalApi)
                .then(res => {
                    console.log(res.data.user_id);
                    this.inputData.user_id = res.data.user_id
                })

        },


    }

</script>
