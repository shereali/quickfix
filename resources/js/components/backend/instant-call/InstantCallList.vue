<template>            <!-- /.card-header -->
   <TableContent style="margin-top:-30px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "instant-call" 

        this.cardTitle ="Instant Call List" 

        this.columnsHead.push('Sn','Name', 'Email', 'Phone')
        this.columnsBody.push('name', 'email','mobile_number')
        // this.columnsBodyExtra = 
        this.isDownload = false; 
        this.isActionBtn = false
        this.isAddItem = false 


       
        
    }
}
</script>
