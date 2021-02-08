<template>            <!-- /.card-header -->
   <TableContent  style="margin-top:-30px;"  v-if="typeof(dataList) == 'object'" :searchForm="searchForm" :sortingForm="sortingForm" :isAddItem="isAddItem" :isEditBtn="isEditBtn" :isDelBtn="isDelBtn" :isActionBtn="isActionBtn" :cardTitle="cardTitle" :columnsHead="columnsHead" :columnsBody="columnsBody" :dataList="dataList" :showEditForm="showEditForm" :deleteItem="deleteItem" :getDataList="getDataList" :excelFields="excelFields" :excelTitle="excelTitle" :isDownload="isDownload" :isSearchBox="isSearchBox" route="admin"></TableContent>
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

        this.columnsHead.push('Sn','Contact Person Name','Number', 'Designation', 'Address', 'Number of Employee','Action')
        this.columnsBody.push('c_contact_person_name','c_contact_person_number', 'c_designation', 'c_address','c_no_of_employee')
        // this.columnsBodyExtra = 
        this.isDownload=false;

       
        
    }
}
</script>
