import Home from '../../../../components/backend/customer-support/Home.vue'
import SignIn from '../../../../components/backend/customer-support/auth/SignIn.vue'
import Customer from '../../../../components/backend/customer-support/customer/Index'
import CreateCustomer from '../../../../components/backend/customer-support/customer/Create'



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

    {
        name:'Customer',
        path:'/customers',
        component:Customer,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Customer',
                
              }
          }

    },

    {
        name:'CreateCustomer',
        path:'/customers/create',
        component:CreateCustomer,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateCustomer',
                
              }
          }

    },

    {
        name:'CreateCustomer',
        path:'/customers/:id',
        component:CreateCustomer,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateCustomer',
                
              }
          }

    },
    

]

export default routeCustomerSupport