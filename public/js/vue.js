const { createApp } = Vue

createApp({
    delimiters: ['{!', '!}'],
    data() {
        return {
            title: '',
            message: 'enviado'
        }
    },
    methods: {
      onSubmit: function (e){
          let formData = new FormData(e.target)
          //console.log(e.target)
          axios.post('/storePost', formData)
              .then((response) => {
                  console.log(response)
                  alert('Submitted')
              }).catch(error => {
                  this.errors = 'Corrija su informacion para poder registrar con éxito'
              console.log(error)
          })
        }
    },
    async mounted(){
        let{data} = await axios.get('/postform')
        // console.log(data)
        this.$refs.form.innerHTML = data.form
        this.title = data.title
    }
}).mount('#app')