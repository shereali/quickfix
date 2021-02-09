<template>
    <div class="py-5">
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
                                        <input type="text" name="name" class="form-control"
                                            v-model="inputData.name" placeholder="Enter Role">
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
        </form>
    </div>
</template>

<script>
    import mixin from '../../../../src/mixin';
    export default {
        mixins: [mixin],
        data() {
            return {

            }
        },
        watch: {

        },
        created() {

            this.generalApi = 'permissions'
            this.backUrl = '/permissions'
            this.cardTitle = this.isEdit ? 'Edit Permission' : 'Add New Permission'

        },
        methods: {

        }


    }

</script>
