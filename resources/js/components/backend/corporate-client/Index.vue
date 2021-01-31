<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-20px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
</template>
<script>
import mixin from '../../../src/mixin';
export default {
    mixins:[mixin],

    created(){
        this.generalApi = "corporate-clients" 

        this.dataSearchingApi="search-brand-data"

        this.cardTitle ="Corporate Client  List" 
        this.isFile = true
        this.isImage = 'image'

        this.columnsHead.push('Sn','Name','Number', 'Designation', 'Address', 'Number of Employee','Action')
        this.columnsBody.push('contact_person_name','contact_person_number', 'designation', 'address','no_of_employee')
        // this.columnsBodyExtra = 
        this.isDownload=false;

       
        
    }
}
</script>
