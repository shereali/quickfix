import Home from '../../../../components/backend/customer-support/Home.vue'
import SignIn from '../../../../components/backend/customer-support/auth/SignIn.vue'


let routeCustomerSupport = [
    {
        name:'Home',
        path:'/',
        component:Home,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Home',
                
              }
          }

    },

    {
        name:'SignIn',
        path:'/signin',
        component:SignIn,
    },

]

export default routeCustomerSupport