<template>
  <button ref="deleteNote" @click="destroyNote" class="badge badge-danger"><i class="fas fa-trash"></i></button>
</template>

<script>
export default {
    props: ['endpoint'],
    methods: {
       async destroyNote(){
          let q = window.confirm('hapus ?');
          if (q == true) {
              console.log(this.endpoint);
                  let response = await axios.delete('/api/obat/' + this.endpoint);
                  if (response.status == 200) {
            
                    this.$toasted.show('Data berhasil di delete', {
                    type: 'success',
                    duration: 3000,
                 })
                    this.$refs.deleteNote.parentNode.parentNode.remove();
             }

          } 
        }
    }
}
</script>