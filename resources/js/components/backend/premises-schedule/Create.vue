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
                                        <label for="">Select Day</label>
                                        <v-select multiple :options="days" :reduce="day => day.sl_no" label="name" v-model="inputData.schedule_day"  placeholder="Select Day"></v-select>
                                        <input type="hidden" name="schedule_day" v-model="inputData.schedule_day">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Start Time</label>
                                        <vue-clock-picker class="form-control" name="start_time" v-model="inputData.start_time" placeholder="Start Time"></vue-clock-picker>
                                         <!-- <vue-clock-picker mode="24" :defaultHour="defaultHour" :defaultMinute="defaultMinute" :onTimeChange="timeChangeHandler"></vue-clock-picker> -->
                                         <!-- <vue-timepicker format="hh:mm A" name="start_time" v-model="inputData.start_time" placeholder="Start Time"></vue-timepicker>                          -->
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <input type="hidden" name="status" v-model="inputData.status">
                                       <v-select :options="status" :reduce="statu => statu.value" label="name" v-model="inputData.status" placeholder="Select Status"></v-select>
                                    </div>
                                    
            
                                    <!-- <vue-timepicker format="hh:mm A" v-model="start_time"></vue-timepicker> -->

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Schedule Duration</label>
                                         <!-- <VueTimepicker></VueTimepicker>  -->
                                         <input type="number" name="schedule_duration" v-model="inputData.schedule_duration" class="form-control">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="">Schedule Create</label>
                                        <input type="hidden" name="schedule_create_id" v-model="inputData.schedule_create_id">
                                       <v-select :options="scheduleCreates" :reduce="scheduleCreate => scheduleCreate.id" label="title" v-model="inputData.schedule_create_id" placeholder="Select Schedule create"></v-select>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="">End Time</label>
                                         <vue-clock-picker  class="form-control" name="end_time" v-model="inputData.end_time" placeholder="End Time"></vue-clock-picker>
                                         <!-- <VueTimepicker></VueTimepicker>  -->
                                         <!-- <vue-timepicker format="hh:mm A" name="end_time" v-model="inputData.end_time" placeholder="End Time"></vue-timepicker>                          -->
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
<style scoped>
.clock-picker__input{
    border: none !important;
}
</style>

<script>
import mixin from '../../../src/mixin';
// import 'vue2-timepicker/dist/VueTimepicker.css'

export default {
  
 
mixins:[mixin], 
 data(){
            return {
                status:[
                    {name:'Active',value:1},
                    {name:'Inactive',value:0}
                ], 
                days: [],
                scheduleCreates: [],
            defaultHour:new Date().getHours(),
            defaultMinute:new Date().getMinutes()


            }
        },
created(){

    this.generalApi = 'premises-schedule'
    this.backUrl = '/premises-schedule'
    this.cardTitle = this.isEdit?'Edit Premises Schedule':'Add New Premises Schedule' 
    this.isFile = true 
    this.isImage = 'image'
    
    axios.get(this.url+'/api/'+this.generalApi)
    .then(res => {
        console.log(res.data.days);
        this.days = res.data.days
        this.scheduleCreates = res.data.scheduleCreates
        if(this.isEdit){
            console.log('jkdhfsdjkhf',res.data);
        }
    })

    setTimeout(()=>{

        
        this.inputData.sl_no.forEach(item => {
            
            console.log('this.inputData.sl_no', item.name);

        })
          
       

    }, 3000)

},
 methods:{
        timeChangeHandler(){
            // ...
        }
    }


}

</script>
