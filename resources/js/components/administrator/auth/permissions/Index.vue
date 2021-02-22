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
                                       <v-select :options="roles" :reduce="role => role.id" label="name" name="role_id" @input="getPermission" placeholder="Select Role" v-model="role_id"></v-select>
                                       <input type="hidden" name="role_id" v-model="role_id">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                           <tr>
                                                <th><input type="checkbox" name="all_checked" id="all_checked" @input="checkAll"> All</th>
                                                <th>Resource Name</th>
                                                <th>Read</th>
                                                <th>Write</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(permission, index) in permissions" :key="index">
                                                <td><label for=""><input type="checkbox" name="all" :class="index+'all'" @input="resourceAll(index)"></label></td>
                                                <td> 
                                                    {{ permission.describe_name }} 
                                                    <input type="hidden" name="module_id[]" :value="permission.id">
                                                    <input type="hidden" name="resource_name[]" :value="permission.resource_name">
                                                </td>
                                                <td><label><input :class="index+'access'" type="checkbox" name="read[]" :value="index" > </label></td>
                                                <td><label><input :class="index+'access'" type="checkbox" name="write[]" :value="index" ></label></td>
                                                <td><label><input :class="index+'access'" type="checkbox" name="update[]" :value="index" ></label></td>
                                                <td><label><input :class="index+'access'" type="checkbox" name="delete[]" :value="index" ></label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-sm btn-success">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-footer">
                        <FormButton :isEdit="isEdit" :backUrl="backUrl"></FormButton>
                    </div> -->
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    
    export default {
        data() {
            return {

                url:window.location.origin,
                roles:[],
                permissions:[],
                formData:{},
                accessList:{},
                role_id:'',
                roleAccess:[
                ],

                checkAccess:[
                    {read:''},
                    {write:''},
                    {update:''},
                    {delete:''}
                ]


            }
        },
        watch: {
            
        },
        created() {

            this.generalApi = 'permissions'
            this.backUrl = '/permissions'
            this.cardTitle = this.isEdit ? 'Edit Permission' : 'Add New Permission'
            this.getRole()
        },
        methods: {
            toastMessage(type, message, icon, position, actionIcon){
            var toast = null;
            if(type == 'success'){
                toast = this.$toasted.success
            } else if(type == 'info'){
                 toast = this.$toasted.info     
            } else if(type == 'error'){
                 toast = this.$toasted.error    
            } else {

            }
            toast(message, {
                // theme:'bubble',
                icon:icon?icon:'check',
                position:position?position:'top-right',
                iconPack:'fontawesome',
                icon:icon?icon:'check',
                duration:2000,
                action: {
                    icon: actionIcon?actionIcon:'times',
                    class:'text-white',
                    onClick: (e, toastObject) => {
                        toastObject.goAway(0);
                    }
                },
            });
        },
            getRole(){
                axios.get(this.url+'/api/permissions')
                .then(res => {
                    this.roles = res.data.roles
                    this.permissions = res.data.permissions

                    console.log('roles', res.data);
                   
                })
            },
            grabAccess(item, permission){
               
                console.log('item', item);
               
            },

            processData(){
                let data = new FormData($('.form')[0])
                axios.post(this.url+'/api/'+this.generalApi, data)
                .then(res=>{
                    console.log('response', res.data);
                     this.toastMessage('success', 'Permission has been applied successfully!')
                })
            },

            getPermission(i){
                axios.get(this.url+'/api/'+this.generalApi+'/'+i)
                .then(res => {
                    console.log('getPermission', res.data);
                    this.roleAccess = res.data
                    let prIndex = []

                    this.permissions.forEach((data, dIndex) => {
                       prIndex[dIndex] = dIndex
                   })

                   if(res.data.length > 0){

                        res.data.forEach((item, index) => {

                            $('tbody tr td').find('input.'+index+'access').prop('checked', false)

                            console.log('prIndex', item.read);
                            $('tbody tr td').find('input[name="read[]"].'+item.read+'access').prop('checked', true);
                            $('tbody tr td').find('input[name="write[]"].'+item.write+'access').prop('checked', true);
                            $('tbody tr td').find('input[name="update[]"].'+item.update+'access').prop('checked', true);
                            $('tbody tr td').find('input[name="delete[]"].'+item.delete+'access').prop('checked', true);
                            
                        });

                   } else {

                       $('tbody tr td').find('input').prop('checked', false)

                   }

                    
                    
                   
                })
            },
            checkAll(){

                console.log($('#all_checked').is(':checked'));
                if($('#all_checked').is(':checked')){

                    $('tbody tr td').find('input').prop('checked', true)

                } else {

                    $('tbody tr td').find('input').prop('checked', false)

                }
            },
            resourceAll(i){
                if($('.'+i+'all').is(':checked')){

                    $('tbody tr td').find('input.'+i+'access').prop('checked', true);

                } else {

                    $('tbody tr td').find('input.'+i+'access').prop('checked', false);
                }
            },
        }


    }

</script>
