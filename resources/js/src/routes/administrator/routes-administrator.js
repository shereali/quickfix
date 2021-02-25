import Home from '../../../components/administrator/Home'
import SignIn from '../../../components/administrator/auth/SignIn.vue'
import User from '../../../components/administrator/auth/users/Index.vue'
import UserCreate from '../../../components/administrator/auth/users/Create.vue'
import RoleCreate from '../../../components/administrator/auth/roles/Create.vue'
import Role from '../../../components/administrator/auth/roles/Index'
import Permission from '../../../components/administrator/auth/permissions/Index.vue'
import PermissionCreate from '../../../components/administrator/auth/permissions/Create.vue'
import AssignRoleModel from '../../../components/administrator/auth/AssignRoleModel'
import AssignPermissionModel from '../../../components/administrator/auth/AssignPermissionModel'
import Module from '../../../components/administrator/auth/modules/Index.vue'
import ModuleCreate from '../../../components/administrator/auth/modules/Create.vue'

let routeAdministrator = [
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
        name:'Module',
        path:'/module-register',
        component:Module,
        meta:{
            auth:true
        }  
    },
    {
        name:'ModuleCreate',
        path:'/module-register/create',
        component:ModuleCreate,
        meta:{
            auth:true
        }  
    },
    {
        name:'ModuleCreate',
        path:'/module-register/:id',
        component:ModuleCreate,
        meta:{
            auth:true
        }  
    },

]

export default routeAdministrator