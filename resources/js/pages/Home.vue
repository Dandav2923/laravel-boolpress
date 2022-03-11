<template>
  <div class="container-fluid">
      <div class="row"> 
          <div class="col">
            <h1>Home</h1>
          </div>
          <Main :cards= "cards"/>
      </div>
  </div>
</template>

<script>
import Axios from 'axios';
import Main from '../components/Main.vue';
export default {
  name : "Home",
  components: {
    Main
  },
  data() {
        return{ 
          cards:{
            postArray: null,
            next_page_url: null,
            prev_page_url: null
          }
        }
    },
    created() {
      const vm = this;
      Axios.get('http://127.0.0.1:8000/api/posts')
      .then(results => {
        vm.cards.postArray = results.data.results.data;
        vm.cards.next_page_url = results.data.next_page_url;
        vm.cards.prev_page_url = results.data.prev_page_url;
      })
      .catch(error => {
        console.log(error);
      })
    }
}
</script>

<style lang="scss" scoped>

</style>