<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-30px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "services" 

        this.dataSearchingApi="search-service-data"

        this.cardTitle ="Service List" 

        this.columnsHead.push('Sn','Name', 'Description', 'Photo','Status', 'Action')
        this.columnsBody.push('name', 'service_description', 'image','status')
        // this.columnsBodyExtra = 
        this.isDownload = false; 

       
        
    }
}
</script>
