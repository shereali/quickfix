import Home from '../../../../components/backend/customer-support/Home.vue'
import SignIn from '../../../../components/backend/customer-support/auth/SignIn.vue'
import CallRequest from '../../../../components/backend/customer-support/call-request/Index'
import CreateCallRequest from '../../../../components/backend/customer-support/call-request/Create'
import Customer from '../../../../components/backend/customer-support/customer/Index'
import CreateCustomer from '../../../../components/backend/customer-support/customer/Create'
import CorporateClient from '../../../../components/backend/customer-support/corporate-client/Index'
import CreateCorporateClient from '../../../../components/backend/customer-support/corporate-client/Create'
import BusinessPartner from '../../../../components/backend/customer-support/business-partner/Index'
import CreateBusinessPartner from '../../../../components/backend/customer-support/business-partner/Create'
import User from '../../../../components/backend/customer-support/auth/users/Index.vue'
import UserCreate from '../../../../components/backend/customer-support/auth/users/Create.vue'



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
        name:'User',
        path:'/user',
        component:User,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'User',
                
              }
          }

    },
    {
        name:'UserCreate',
        path:'/user/create',
        component:UserCreate,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'UserCreate',
                
              }
          }

    },
    {
        name:'UserCreate',
        path:'/user/:id',
        component:UserCreate,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'UserCreate',
                
              }
          }

    },

    {
        name:'SignIn',
        path:'/signin',
        component:SignIn,
    },
    {
        name:'CallRequest',
        path:'/call-request',
        component:CallRequest,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CallRequest',
                
              }
          }

    },
    {
        name:'CreateCallRequest',
        path:'/call-request/:id',
        component:CreateCallRequest,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateCallRequest',
                
              }
          }

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
    {
        name:'CorporateClient',
        path:'/corporate-clients',
        component:CorporateClient,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CorporateClient',
                
              }
          }

    },

    {
        name:'CreateCorporateClient',
        path:'/corporate-clients/create',
        component:CreateCorporateClient,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateCorporateClient',
                
              }
          }

    },

    {
        name:'CreateCorporateClient',
        path:'/corporate-clients/:id',
        component:CreateCorporateClient,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateCorporateClient',
                
              }
          }

    },
    {
        name:'BusinessPartner',
        path:'/business-partners',
        component:BusinessPartner,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'BusinessPartner',
                
              }
          }

    },

    {
        name:'CreateBusinessPartner',
        path:'/business-partners/create',
        component:CreateBusinessPartner,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateBusinessPartner',
                
              }
          }

    },

    {
        name:'CreateBusinessPartner',
        path:'/business-partners/:id',
        component:CreateBusinessPartner,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateBusinessPartner',
                
              }
          }

    },
    

]

export default routeCustomerSupport