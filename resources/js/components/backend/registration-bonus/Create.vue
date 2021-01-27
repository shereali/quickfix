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
                                            class="form-control" placeholder="Enter title">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Start Date</label>
                                        <input type="date" name="start_date" v-model="inputData.start_date"
                                            class="form-control">

                                    </div>
                                     <div class="form-group">
                                        <label for="">Bonus Type</label>
                                        <input type="hidden" name="bonus_type" v-model="inputData.bonus_type">
                                       <v-select :options="bonus_types" :reduce="bonus_type => bonus_type.value" label="name" v-model="inputData.bonus_type" placeholder="Select Bonus type"></v-select>
                                   </div>
                                   <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" v-model="inputData.description"
                                            class="form-control" cols="2" rows="2"></textarea>
                                    </div>                               
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Bonus Amount</label>
                                        <input type="number" name="amount" v-model="inputData.amount"
                                            class="form-control" >

                                    </div>
                                    <div class="form-group">
                                        <label for="">End Date</label>
                                        <input type="date" name="end_date" v-model="inputData.end_date"
                                            class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <input type="hidden" name="status" v-model="inputData.status">
                                       <v-select :options="status" :reduce="statu => statu.value" label="name" v-model="inputData.status" placeholder="Select Status"></v-select>
                                   </div>
                                   <div class="form-group">
                                        <label for="">Photo</label>
                                        <input type="file" name="image" class="form-control">
                                         <div v-if="isEdit" class="m-4">
                                            <img :src="inputData.image_path" style="width:80px; height:80px;" class="img-fluid" alt="">
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
        mixins: [mixin],
     data(){
            return {
                status:[
                            {name:'Active',value:1},
                            {name:'Inactive',value:0}
                        ],
                bonus_types:[
                            {name:'Registration',value:1},
                            {name:'Referral',value:2}
                        ],
              
            }
         },
        created() {

            this.generalApi = 'registration-bonus'
            this.backUrl = '/registration-bonus'
            this.cardTitle = this.isEdit ? 'Edit Registration Bonus' : 'Add New Registration Bonus'
             this.isFile = true 
             this.isImage = 'image'

            axios.get(this.url + '/api/'+this.generalApi)
                .then(res => {
                    // console.log(res.data.brands);
                    
                    
                })

        },


    }

</script>
