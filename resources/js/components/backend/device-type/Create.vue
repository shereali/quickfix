<template>
    <div>
        <form class="form" @submit.prevent="processData()">
            <div class="row" style="margin-top: 5%;">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ cardTitle }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="form-group">
                                        <label for="">Type Name</label>
                                        <input type="text" name="type_name" v-model="inputData.type_name"
                                            class="form-control" placeholder="Enter Type Name">
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

            this.generalApi = 'device-types'
            this.backUrl = '/device-types'
            this.cardTitle = this.isEdit ? 'Edit Device Type' : 'Add New Device Type'

            axios.get(this.url + '/api/' + this.generalApi)
                .then(res => {
                    console.log(res.data.user_id);
                    this.inputData.user_id = res.data.user_id
                })

        },


    }

</script>
