<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-20px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
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

            this.columnsHead.push('Sn', 'Role', 'Action')
            this.columnsBody.push('name')
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
