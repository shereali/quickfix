<template>            <!-- /.card-header -->
   <TableContent  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "registration-bonus" 

        this.dataSearchingApi="search-device-models-data"

        this.cardTitle ="Customer Registration Bonus List"  
        this.isFile = true

        this.columnsHead.push('Sn','Title', 'Start Date', 'End Date','Bonus Amount','Description','Photo', 'Status', 'Action')
        this.columnsBody.push('title','start_date','end_date','amount', 'description', 'image', 'statusText')
        // this.columnsBodyExtra = 
        this.isDownload=false;

       
        
    }
}
</script>
