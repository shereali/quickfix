export default {
        data(){
           return {
               url:window.location.origin,
               blogImage:'',
               serviceImage:''

           } 
        },
        created(){
            this.blogImage = this.url+'/images/blog/'
            this.serviceImage = this.url+'/images/service-type/'
        }
    }
