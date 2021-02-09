<template>
    <div>
        <div class="row  py-5">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <router-link :to="this.$route.path+'/create'" class="btn btn-sm btn-primary float-right m-1" >Add New</router-link>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-response">

                            <thead>
                                <tr class="table-secondary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr v-for="(role, index) in roles.data" :key="index" v-if="!role.isComplete">
                                    <td>{{ roles.meta.from + index }}</td>
                                    <td>{{ role.name }}</td>
                                    <td>
                                        <li v-for="(permission, prIndex) in role.permissions" :key="prIndex">
                                            <span>{{ permission.name }}</span></li>
                                    </td>
                                    <td>
                                        <a href="#"  @click.prevent="showEditForm(role.id)"
                                            class="btn btn-success btn-circle btn-xs">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" v-if="$can('role-list')" @click.prevent="deleteItem(role.id)"
                                            class="btn btn-danger btn-circle btn-xs">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
</template>
<script>
    import mixin from '../../../../src/mixin';
    export default {
        mixins: [mixin],
        data() {
            return {
                roles: {}
            }
        },

        created() {
            this.generalApi = "roles"

            this.dataSearchingApi = "search-admin-data"

            this.cardTitle = "Role List"

            this.columnsHead.push('Sn', 'Role', 'Permission', 'Action')
            this.columnsBody.push('name', 'permission')
            // this.columnsBodyExtra = 
            this.isDownload = false
            this.getRoles()

        },

        methods: {
            getRoles() {
                axios.get(this.generalApi)
                    .then(res => {
                        this.roles = res.data
                        console.log(' this.roles', this.roles)
                    })
            }
        }
    }

</script>
