<template>
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Dokter</h4>
                 
                  <div class="card-header-action">
                  </div>
            
                <input type="text" v-model="search" placeholder="search">
                 
                </div>  
                
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>NAMA</th>
                          <th>SPECIALIS</th>
                          <th>DETAIL</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(dokter, index) in filteredDokters" :key="dokter.id">
                          
                            <td>{{ index+1 }}</td>
                            <td>{{ dokter.nama }}</td>
                            <td>{{ dokter.specialis }}</td>
                             <td>
                                <router-link data-toggle="modal" data-target="#staticBackdrop" :to="{ name: 'showdokterhome', params: { dokter: dokter.nama } }"  type="submit" class="badge badge-info"><i class="fas fa-search"></i></router-link> 
                            </td>              
                        </tr>
                     </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

</template>

<script>
export default {


 



    data() {
        return {
            dokters:[],
            search:'',
        }
    },

    computed:{
      filteredDokters() {
        return this.dokters.filter(dokter=>{
          return dokter.nama.includes(this.search)
        })
      }
    },

    mounted(){
        this.getdokters();
    },


    methods: {
         async getdokters() {
                let response = await axios.get('api/dokter/ambildokter');
                this.dokters = response.data
                },
    }





}
</script>

