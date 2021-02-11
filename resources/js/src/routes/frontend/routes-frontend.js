import Home from '../../../components/frontend/Home'
// import SignIn from '../../../components/frontend/auth/SignIn'
import GetQuery from '../../../components/frontend/get-query/Index'

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