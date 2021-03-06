import Home from '../../../components/backend/Home'
import SignIn from '../../../components/backend/auth/SignIn'
import User from '../../../components/backend/auth/users/Index'
import UserCreate from '../../../components/backend/auth/users/Create'
import RoleCreate from '../../../components/backend/auth/roles/Create.vue'
import Role from '../../../components/backend/auth/roles/Index'
import Permission from '../../../components/backend/auth/permissions/Index.vue'
import PermissionCreate from '../../../components/backend/auth/permissions/Create.vue'
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
import DeviceType from '../../../components/backend/device-type/Index'
import CreateDeviceType from '../../../components/backend/device-type/Create'
import Device from '../../../components/backend/device/Index'
import CreateDevice from '../../../components/backend/device/Create'
import DeviceFunctionalType from '../../../components/backend/device-functional-type/Index'
import CreateDeviceFunctionalType from '../../../components/backend/device-functional-type/Create'
import ServiceType from '../../../components/backend/service-type/Index'
import CreateServiceType from '../../../components/backend/service-type/Create'
import ProblemType from '../../../components/backend/problem-type/Index'
import CreateProblemType from '../../../components/backend/problem-type/Create'
import Zone from '../../../components/backend/zone/Index'
import CreateZone from '../../../components/backend/zone/Create'
import DeviceProblem from '../../../components/backend/device-problem/Index'
import CreateDeviceProblem from '../../../components/backend/device-problem/Create'
import ExperienceCategory from '../../../components/backend/experience-category/Index'
import CreateExperienceCategory from '../../../components/backend/experience-category/Create'
import Customer from '../../../components/backend/customer/Index'
import CreateCustomer from '../../../components/backend/customer/Create'
import RegistrationBonus from '../../../components/backend/registration-bonus/Index'
import CreateRegistrationBonus from '../../../components/backend/registration-bonus/Create'
import WorkExperience from '../../../components/backend/work-experience/Index'
import CreateWorkExperience from '../../../components/backend/work-experience/Create'
import CorporateClient from '../../../components/backend/corporate-client/Index'
import CreateCorporateClient from '../../../components/backend/corporate-client/Create'
import BusinessPartner from '../../../components/backend/business-partner/Index'
import CreateBusinessPartner from '../../../components/backend/business-partner/Create'
import ServiceProcess from '../../../components/backend/service-process/Index'
import CreateServiceProcess from '../../../components/backend/service-process/Create'
import Blog from '../../../components/backend/blog/Index'
import CreateBlog from '../../../components/backend/blog/Create'
import Premises from '../../../components/backend/premises-schedule/Index'
import CreatePremises from '../../../components/backend/premises-schedule/Create'


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
        path:'/roles',
        component:Role,
        
        meta: {
            auth: true,
            // breadcrumb: {
            //     label: 'Role',
                
            //   }
          }

    },
    {
        name:'RoleCreate',
        path:'/roles/create',
        component:RoleCreate,
        
        meta: {
            auth: true,
            // breadcrumb: {
            //     label: 'Role',
                
            //   }
          }

    },
    {
        name:'RoleCreate',
        path:'/roles/:id',
        component:RoleCreate,
        
        meta: {
            auth: true,
            // breadcrumb: {
            //     label: 'Role',
                
            //   }
          }

    },
    {
        name:'Permission',
        path:'/permissions',
        component:Permission,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Permission',
                
              }
          }

    },
    {
        name:'PermissionCreate',
        path:'/permissions/create',
        component:PermissionCreate,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'PermissionCreate',
                
              }
          }

    },
    {
        name:'PermissionCreate',
        path:'/permissions/:id',
        component:PermissionCreate,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'PermissionCreate',
                
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
        name:'CreateDeviceModel',
        path:'/device-models/:id',
        component:CreateDeviceModel,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateDeviceModel',
                
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
    {
        name:'DeviceType',
        path:'/device-types',
        component:DeviceType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Device Type',
                
              }
          }

    },

    {
        name:'CreateDeviceType',
        path:'/device-types/create',
        component:CreateDeviceType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Create Device Type',
                
              }
          }

    },

    {
        name:'CreateDeviceType',
        path:'/device-types/:id',
        component:CreateDeviceType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Create Device Type',
                
              }
          }

    },
    {
        name:'Device',
        path:'/device',
        component:Device,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Device',
                
              }
          }

    },

    {
        name:'CreateDevice',
        path:'/device/create',
        component:CreateDevice,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Create Device',
                
              }
          }

    },

    {
        name:'CreateDevice',
        path:'/device/:id',
        component:CreateDevice,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Create Device',
                
              }
          }

    },
    {
        name:'DeviceFunctionalType',
        path:'/device-functional-type',
        component:DeviceFunctionalType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'DeviceFunctionalType',
                
              }
          }

    },

    {
        name:'CreateDeviceFunctionalType',
        path:'/device-functional-type/create',
        component:CreateDeviceFunctionalType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Create Device',
                
              }
          }

    },

    {
        name:'CreateDeviceFunctionalType',
        path:'/device-functional-type/:id',
        component:CreateDeviceFunctionalType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateDeviceFunctionalType',
                
              }
          }

    },
    {
        name:'ServiceType',
        path:'/service-type',
        component:ServiceType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'ServiceType',
                
              }
          }

    },

    {
        name:'CreateServiceType',
        path:'/service-type/create',
        component:CreateServiceType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateServiceType',
                
              }
          }

    },

    {
        name:'CreateServiceType',
        path:'/service-type/:id',
        component:CreateServiceType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateServiceType',
                
              }
          }

    },
    {
        name:'ProblemType',
        path:'/problem-type',
        component:ProblemType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'ProblemType',
                
              }
          }

    },

    {
        name:'CreateProblemType',
        path:'/problem-type/create',
        component:CreateProblemType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateProblemType',
                
              }
          }

    },

    {
        name:'CreateProblemType',
        path:'/problem-type/:id',
        component:CreateProblemType,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateProblemType',
                
              }
          }

    },
    {
        name:'Zone',
        path:'/zone',
        component:Zone,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Zone',
                
              }
          }

    },

    {
        name:'CreateZone',
        path:'/zone/create',
        component:CreateZone,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateZone',
                
              }
          }

    },

    {
        name:'CreateZone',
        path:'/zone/:id',
        component:CreateZone,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateZone',
                
              }
          }

    },
    {
        name:'DeviceProblem',
        path:'/device-problems',
        component:DeviceProblem,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'DeviceProblem',
                
              }
          }

    },

    {
        name:'CreateDeviceProblem',
        path:'/device-problems/create',
        component:CreateDeviceProblem,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateDeviceProblem',
                
              }
          }

    },

    {
        name:'CreateDeviceProblem',
        path:'/device-problems/:id',
        component:CreateDeviceProblem,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateDeviceProblem',
                
              }
          }

    },
    {
        name:'ExperienceCategory',
        path:'/experience-category',
        component:ExperienceCategory,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'ExperienceCategory',
                
              }
          }

    },

    {
        name:'CreateExperienceCategory',
        path:'/experience-category/create',
        component:CreateExperienceCategory,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateExperienceCategory',
                
              }
          }

    },

    {
        name:'CreateExperienceCategory',
        path:'/experience-category/:id',
        component:CreateExperienceCategory,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateExperienceCategory',
                
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
        name:'RegistrationBonus',
        path:'/bonus',
        component:RegistrationBonus,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'RegistrationBonus',
                
              }
          }

    },

    {
        name:'CreateRegistrationBonus',
        path:'/bonus/create',
        component:CreateRegistrationBonus,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateRegistrationBonus',
                
              }
          }

    },

    {
        name:'CreateRegistrationBonus',
        path:'/bonus/:id',
        component:CreateRegistrationBonus,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateRegistrationBonus',
                
              }
          }

    },
    {
        name:'WorkExperience',
        path:'/work-experience',
        component:WorkExperience,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'WorkExperience',
                
              }
          }

    },

    {
        name:'CreateWorkExperience',
        path:'/work-experience/create',
        component:CreateWorkExperience,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateWorkExperience',
                
              }
          }

    },

    {
        name:'CreateWorkExperience',
        path:'/work-experience/:id',
        component:CreateWorkExperience,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateWorkExperience',
                
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
    {
        name:'ServiceProcess',
        path:'/service-process',
        component:ServiceProcess,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'ServiceProcess',
                
              }
          }

    },

    {
        name:'CreateServiceProcess',
        path:'/service-process/create',
        component:CreateServiceProcess,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateServiceProcess',
                
              }
          }

    },

    {
        name:'CreateServiceProcess',
        path:'/service-process/:id',
        component:CreateServiceProcess,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateServiceProcess',
                
              }
          }

    },
    {
        name:'Blog',
        path:'/blog',
        component:Blog,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Blog',
                
              }
          }

    },

    {
        name:'CreateBlog',
        path:'/blog/create',
        component:CreateBlog,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateBlog',
                
              }
          }

    },

    {
        name:'CreateBlog',
        path:'/blog/:id',
        component:CreateBlog,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreateBlog',
                
              }
          }

    },
    {
        name:'Premises',
        path:'/premises-schedule',
        component:Premises,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'Premises',
                
              }
          }

    },

    {
        name:'CreatePremises',
        path:'/premises-schedule/create',
        component:CreatePremises,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreatePremises',
                
              }
          }

    },

    {
        name:'CreatePremises',
        path:'/premises-schedule/:id',
        component:CreatePremises,
        
        meta: {
            auth: true,
            breadcrumb: {
                label: 'CreatePremises',
                
              }
          }

    },
]

export default routeBackend