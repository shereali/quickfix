import Home from '../../../components/backend/Home'
import SignIn from '../../../components/backend/auth/SignIn'
import User from '../../../components/backend/auth/users/Index'
import UserCreate from '../../../components/backend/auth/users/Create'
import Role from '../../../components/backend/auth/roles/Index'
import Permission from '../../../components/backend/auth/Permission'
import AssignRoleModel from '../../../components/backend/auth/AssignRoleModel'
import AssignPermissionModel from '../../../components/backend/auth/AssignPermissionModel'
import Service from '../../../components/backend/services/Index'
import CreateService from '../../../components/backend/services/Create'
import ServiceCategory from '../../../components/backend/service-categories/Index'
import CreateServiceCategory from '../../../components/backend/service-categories/Create'
import Brand from '../../../components/backend/brands/Index'
import CreateBrand from '../../../components/backend/brands/Create'
import DeviceModel from '../../../components/backend/device-models/Index'
import CreateDeviceModel from '../../../components/backend/device-models/Create'
import Discount from '../../../components/backend/discounts/Index'
import CreateDiscount from '../../../components/backend/discounts/Create'

import InstantCallList from '../../../components/backend/instant-call/InstantCallList'
import Quotation from '../../../components/backend/quotation/QuotationList'

let routeBackend = [
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
        name:'User',
        path:'/users',
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
        path:'/users/create',
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
        path:'/users/:id',
        component:UserCreate,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'UserCreate',
                
              }
          }

    },

    {
        name:'Role',
        path:'/role',
        component:Role,
        
        meta: {
            auth: true,
            // breadcrumb: {
            //     label: 'Role',
                
            //   }
          }

    },
    {
        name:'Permission',
        path:'/permission',
        component:Permission,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Permission',
                
              }
          }

    },
    {
        name:'AssignRoleModel',
        path:'/assign-role-model',
        component:AssignRoleModel,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'AssignRoleModel',
                
              }
          }

    },
    {
        name:'AssignPermissionModel',
        path:'/assign-permission-model',
        component:AssignPermissionModel,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'AssignPermissionModel',
                
              }
          }

    },
    {
        name:'Service',
        path:'/services',
        component:Service,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'User',
                
              }
          }

    },

    {
        name:'CreateService',
        path:'/services/create',
        component:CreateService,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateService',
                
              }
          }

    },

    {
        name:'CreateService',
        path:'/services/:id',
        component:CreateService,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateService',
                
              }
          }

    },

    {
        name:'ServiceCategory',
        path:'/service-categories',
        component:ServiceCategory,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'ServiceCategory',
                
              }
          }

    },

    {
        name:'CreateServiceCategory',
        path:'/service-categories/create',
        component:CreateServiceCategory,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateServiceCategory',
                
              }
          }

    },

    {
        name:'CreateServiceCategory',
        path:'/service-categories/:id',
        component:CreateServiceCategory,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateServiceCategory',
                
              }
          }

    },

    {
        name:'DeviceModel',
        path:'/device-models',
        component:DeviceModel,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'DeviceModel',
                
              }
          }

    },

    {
        name:'CreateDeviceModel',
        path:'/device-models/create',
        component:CreateDeviceModel,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateDeviceModel',
                
              }
          }

    },

    {
        name:'CreateService',
        path:'/device-models/:id',
        component:CreateService,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateService',
                
              }
          }

    },

    {
        name:'Brand',
        path:'/brands',
        component:Brand,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Brand',
                
              }
          }

    },

    {
        name:'CreateBrand',
        path:'/brands/create',
        component:CreateBrand,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateBrand',
                
              }
          }

    },

    {
        name:'CreateBrand',
        path:'/brands/:id',
        component:CreateBrand,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateBrand',
                
              }
          }

    },

    {
        name:'Discount',
        path:'/discounts',
        component:Discount,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Discount',
                
              }
          }

    },

    {
        name:'CreateDiscount',
        path:'/discounts/create',
        component:CreateDiscount,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateDiscount',
                
              }
          }

    },

    {
        name:'CreateDiscount',
        path:'/discounts/:id',
        component:CreateDiscount,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateDiscount',
                
              }
          }

    },
    {
        name:'InstantCallList',
        path:'/instant-call',
        component:InstantCallList,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateDiscount',
                
              }
          }

    },
    {
        name:'Quotation',
        path:'/quotation',
        component:Quotation,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateDiscount',
                
              }
          }

    },
]

export default routeBackend