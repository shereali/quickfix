<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-20px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "permissions" 

        this.dataSearchingApi="search-admin-data"

        this.cardTitle ="Permission List" 

        this.columnsHead.push('Sn','Permission', 'Guard Name', 'Action')
        this.columnsBody.push('name', 'guard_name')
        // this.columnsBodyExtra = 
        this.isDownload=false;

       
        
    }
}
</script>
