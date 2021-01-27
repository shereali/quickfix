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
                                        <label for="">Title</label>
                                        <input type="text" name="title" v-model="inputData.title" class="form-control"
                                            placeholder="">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Code</label>
                                        <input type="text" name="code" v-model="inputData.code" class="form-control"
                                            placeholder="">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Discount Start</label>
                                        <input type="text" name="discount_start_date"
                                            v-model="inputData.discount_start_date" class="form-control" placeholder="">

                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Discount Value</label>
                                        <input type="text" name="discount_value" v-model="inputData.discount_value"
                                            class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Discount End</label>
                                        <input type="text" name="discount_expire_date"
                                            v-model="inputData.discount_expire_date" class="form-control"
                                            placeholder="">
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

            this.generalApi = 'discounts'
            this.backUrl = '/discounts'
            this.cardTitle = this.isEdit ? 'Edit Discount' : 'Add New Discount'

            axios.get(this.url + '/api/' + this.generalApi)
                .then(res => {
                    console.log(res.data.user_id);
                    this.inputData.user_id = res.data.user_id
                })

        },


    }

</script>
