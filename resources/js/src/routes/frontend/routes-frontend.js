import Home from '../../../components/frontend/Home'
// import SignIn from '../../../components/frontend/auth/SignIn'
import GetQuery from '../../../components/frontend/get-query/Index'
import BlogDetails from '../../../components/frontend/blog-details/Index'
import ServicePartner from '../../../components/frontend/service-partner/Index'

let routeFrontend = [

    {
        name:'Home',
        path:'/',
        component:Home,
        
        // meta: {
        //     auth: true,
        //     breadcrumb: {
        //         label: 'Home',
                
        //       }
        //   }

    },
    {
        name:'GetQuery',
        path:'/get-query',
        component:GetQuery,

    },
    
    {
        name:'BlogDetails',
        path:'/blog-details',
        component:BlogDetails,

    },

    {
        name:'BlogDetails',
        path:'/blog-details/:id',
        component:BlogDetails,

    },
    {
        name:'ServicePartner',
        path:'/service-partner',
        component:ServicePartner
    }
    // {
    //     name:'SignIn',
    //     path:'/signin',
    //     component:SignIn,
        
    //     // meta: {
    //     //     auth: true,
    //     //     breadcrumb: {
    //     //         label: 'Home',
                
    //     //       }
    //     //   }

    // },
]

export default routeFrontend