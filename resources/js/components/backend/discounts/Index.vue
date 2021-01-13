<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-20px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "discounts" 

        this.dataSearchingApi="search-discounts-data"
        this.isFile = true 

        this.cardTitle ="Discount List" 
        this.columnsHead.push('Sn','Type', 'Title', 'Desctiption','Discount Value', 'Start', 'Expired', 'Status', 'Action')
        this.columnsBody.push('type', 'title', 'description','discount_value', 'discount_start_date', 'discount_expire_date', 'status')
        // this.columnsBodyExtra = 
        this.isDownload=false;

       
        
    }
}
</script>
