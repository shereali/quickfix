<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-20px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "module-register" 

        this.dataSearchingApi="search-admin-data"

        this.cardTitle ="Registered Module" 

        this.columnsHead.push('Sn','Describe Name', 'Resource Name', 'Read', 'Write', 'Update', 'Delete', 'Action')
        this.columnsBody.push('describe_name','resource_name','read_checkbox','write_checkbox','update_checkbox','delete_checkbox')
        // this.columnsBodyExtra = 
        this.isDownload=false;

       
        
    }
}
</script>
