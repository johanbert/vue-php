const BASE_URL = "http://localhost/projects";
const URL_CRUD = "/php/crud.php";
const API = 'https://api.adviceslip.com/advice'
const user = {
    id: null,
    fullname:'',
    card_type:'',
    card_id:null,
    birth_date: null,
    created_at: new Date(),
    updated_at: new Date(),
    request_type: null
}
const cardTypes = [{name:'Cedula de ciudadanía'},{name:'Cedula de extranjería'},{name:'Tarjeta de identidad'}]
const defaultValues = { 
  first_name:''
}
const app = new Vue({
    el: '#app',
    data: { user,cards:cardTypes,defaultValues },
    methods: {
      getUser:function(){
        console.log('test', this.user );
        this.user.request_type = 'getUser';
        // this.user.card_id = 1020123456;
        axios.post(BASE_URL+URL_CRUD,this.user)
        .then((response) => {
          console.log('response',response);
          this.user = response.data;
          this.defaultValues.first_name = this.user.fullname.split(' ')[0]; 
        })
        .catch((err)=>{
          console.log(err);
        })
      },
      updateUser:function(){
        console.log('test update', this.user );
        this.user.request_type = 'updateUser';
        axios.post(BASE_URL+URL_CRUD,this.user)
        .then((response) => {
          console.log('greatttt',response);
          Swal.fire(
            '¡Hecho!',
            this.defaultValues.first_name+' ha actualizado sus datos',
            'success'
          )
        })
        .catch((err)=>{
          console.log(err);
        })
      },
    },
    created:function(){
      this.getUser();
     }
  }
)

