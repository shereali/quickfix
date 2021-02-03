<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-20px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "problem-type" 

        this.dataSearchingApi="search-service-data"

        this.cardTitle ="Problem Type List" 

        this.columnsHead.push('Sn','Device Model',' Name', 'Description', 'Photo','Status', 'Action')
        this.columnsBody.push('model_number', 'name', 'description','image','statusText')
        // this.columnsBodyExtra = 
        this.isDownload = false; 

       
        
    }
}
</script>
