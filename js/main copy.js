// const app = new Vue({
//     el
// })
// import { createApp } from 'vue';

const Counter = {
    data() {
      return {
        counter: 0
      }
    },
    mounted() {
        setInterval(() => {
          this.counter++
        }, 1000)
      }
  }
  
Vue.createApp(Counter).mount('#counter')

const AttributeBinding = {
    data() {
      return {
        message: 'You loaded this page on ' + new Date().toLocaleString()
      }
    }
  }
  
Vue.createApp(AttributeBinding).mount('#bind-attribute')

// Create a Vue application
const app = Vue.createApp({})

// Define a new global component called button-counter
app.component('button-counter', {
  data() {
    return {
      count: 0
    }
  },
  template: `
    <button v-on:click="count++">
      You clicked me {{ count }} times.
    </button>`
})

app.mount('#components-demo')

// const API = 
const myAppComponent = {
    // name: 'Test',
    data(){
      return {
        responseData: {}
      }
    },
    methods: {
      fetchApi(){
          console.log('test api');
      }
    },
    mounted(){
        this.fetchApi();
    }
  }
  const myapp = Vue.createApp(myAppComponent).mount('#app')