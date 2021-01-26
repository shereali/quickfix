<template>            <!-- /.card-header -->
   <TableContent  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "device-problems" 

        this.dataSearchingApi="search-device-models-data"

        this.cardTitle ="Device Problem List"  
        this.isFile = true

        this.columnsHead.push('Sn','Problem', 'Description', 'Original price','Master copy price', 'Status', 'Action')
        this.columnsBody.push('problem','description', 'original_price','master_copy_price', 'statusText')
        // this.columnsBodyExtra = 
        this.isDownload=false;

       
        
    }
}
</script>
