<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-20px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "get-quotation" 

            // name
            // email
            // phone_number
            // brand_name
            // device_name
            // model_name
            // model_number
            // problem

        this.cardTitle ="Quotation List" 

        this.columnsHead.push('Sn','Name', 'Email', 'Phone','Device Name', 'Brand', 'Model', 'Problem')
        this.columnsBody.push('name', 'email', 'phone_number','device_name','brand_name', 'model_number', 'problem')
        // this.columnsBodyExtra = 
        this.isDownload = false; 
        this.isDownload = false; 
        this.isActionBtn = false
        this.isAddItem = false 

       
        
    }
}
</script>
