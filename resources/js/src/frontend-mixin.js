export default {
        data(){
           return {
               url:window.location.origin,
               blogImage:''

           } 
        },
        created(){
            this.blogImage = this.url+'/images/blog/'
        }
    }
