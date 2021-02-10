import Home from '../../../../components/backend/customer-support/Home.vue'
import SignIn from '../../../../components/backend/customer-support/auth/SignIn.vue'
import Customer from '../../../../components/backend/customer-support/customer/Index'
import CreateCustomer from '../../../../components/backend/customer-support/customer/Create'
import CorporateClient from '../../../../components/backend/customer-support/corporate-client/Index'
import CreateCorporateClient from '../../../../components/backend/customer-support/corporate-client/Create'
import BusinessPartner from '../../../../components/backend/customer-support/business-partner/Index'
import CreateBusinessPartner from '../../../../components/backend/customer-support/business-partner/Create'



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