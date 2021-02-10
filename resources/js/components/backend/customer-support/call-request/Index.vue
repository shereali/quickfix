<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-30px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "call-request" 

        this.dataSearchingApi="search-brand-data"

        this.cardTitle ="Call Request  List" 
        this.isFile = true
        this.isImage = 'image'

        this.columnsHead.push('Sn',' Name','Mobile Number', 'Status', 'Remarks','Action')
        this.columnsBody.push('name','mobile_number', 'status', 'remarks')
        // this.columnsBodyExtra = 
        this.isDownload = false;
        this.isAddItem  = false;

       
        
    }
}
</script>
