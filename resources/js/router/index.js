import admin from '../admin'
//kelas
import tablekelas from '../kelas/table'
import createkelas from '../kelas/create'
import showkelas from '../kelas/show'
import kelasedit from '../kelas/edit'

//obat
import tableobat from '../obat/table'
import createobat from '../obat/create'
import showobat from '../obat/show'
import editobat from '../obat/edit'

//pasien
import tablepasien from '../pasien/table'
import createpasien from '../pasien/create'
import showpasien from '../pasien/show'
import editpasien from '../pasien/edit'



//dokter
import createdokter from '../dokter/create'
import tabledokter from '../dokter/table'
import doktershow from '../dokter/show'
import dokteredit from '../dokter/edit'





//home
import tabledokterhome from '../home/tabledokter'
import showdokterhome from '../home/showdokter'
import tablekelashome from '../home/tablekelas'
import showkelashome from '../home/showkelas'
import tableobathome from '../home/tableobat'
import showobathome from '../home/showobat'
import tablepasienhome from '../home/tablepasien'
import showpasienhome from '../home/showpasien'
import homehome from '../home/homehome'

export default{
    node: 'history',

    routes: [
        {
            path: '/',
            name: 'admin',
            component: admin
        },

        {
            path: '/createdokter',
            name: 'createdokter',
            component: createdokter
        },
        
         {
            path: '/tabledokter',
            name: 'tabledokter',
            component: tabledokter
        },
        {
            path: '/dokter/:dokter',
            name: 'doktershow',
            component: doktershow
        },


        {
            path: '/dokter/:dokter',
            name: 'dokteredit',
            component: dokteredit
        },

        //kelas
        
        {
            path: '/tablekelas',
            name: 'tablekelas',
            component: tablekelas
        },
        
        {
            path: '/createkelas',
            name: 'createkelas',
            component: createkelas
        },
        
        {
            path: '/kelas:kelas',
            name: 'showkelas',
            component: showkelas
        },
        {
            path: '/kelas:kelas',
            name: 'kelasedit',
            component: kelasedit
        },


        //obat
        
        {
            path: '/tableobat',
            name: 'tableobat',
            component: tableobat
        },
        
        {
            path: '/createobat',
            name: 'createobat',
            component: createobat
        },
        
        {
            path: '/obat:obat',
            name: 'showobat',
            component: showobat
        },
        {
            path: '/obat:obat',
            name: 'editobat',
            component: editobat
        },

        //pasien
        {
            path: '/tabelpasien',
            name: 'tablepasien',
            component: tablepasien
        },
        {
            path: '/createpasien',
            name: 'createpasien',
            component: createpasien
        },
        {
            path: '/pasien:pasien',
            name: 'showpasien',
            component: showpasien
        },
        {
            path: '/pasien:pasien/edit',
            name: 'editpasien',
            component: editpasien
        },



        //home
        {
            path: '/tabledokterhome',
            name: 'tabledokterhome',
            component: tabledokterhome
        },
        
        {
            path: '/showdokterhome',
            name: 'showdokterhome',
            component: showdokterhome
        },
        
        {
            path: '/tablekelashome',
            name: 'tablekelashome',
            component: tablekelashome
        },
        
        {
            path: '/showkelashome',
            name: 'showkelashome',
            component: showkelashome
        },
        
        {
            path: '/tableobathome',
            name: 'tableobathome',
            component: tableobathome
        },

        
        {
            path: '/showobathome',
            name: 'showobathome',
            component: showobathome
        },

        
        {
            path: '/tablepasienhome',
            name: 'tablepasienhome',
            component: tablepasienhome
        },

        
        {
            path: '/showpasienhome',
            name: 'showpasienhome',
            component: showpasienhome
        },

        
        {
            path: '/homehome',
            name: 'homehome',
            component: homehome
        },


    ]
}