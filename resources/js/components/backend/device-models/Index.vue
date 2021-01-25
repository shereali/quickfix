<template>            <!-- /.card-header -->
   <TableContent  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "device-models" 

        this.dataSearchingApi="search-device-models-data"

        this.cardTitle ="Device Model List"  
        this.isFile = true

        this.columnsHead.push('Sn','Brand Name','Model Name', 'Model No.', 'Description','Photo', 'Status', 'Action')
        this.columnsBody.push('brand_name', 'model_name','model_number', 'description', 'image', 'statusText')
        // this.columnsBodyExtra = 
        this.isDownload=false;

       
        
    }
}
</script>
