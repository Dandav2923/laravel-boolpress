<template>
  <div class="container-fluid">
      <div class="row"> 
          <div class="col">
            <h1>Home</h1>
          </div>
          <Main :cards= "cards" @changePage="changePage($event)"/>
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
            postArray: [],
            next_page_url: null,
            prev_page_url: null
          }
        }
    },
    created() {
      this.getPosts('http://127.0.0.1:8000/api/posts');
    },
    methods: {
      changePage(vs) {
        let url = this.cards[vs];
        if(url) {
          this.getPosts(url);
        }
    },
    getPosts(url){
      const vm = this;
      Axios.get(url)
      .then(results => {
        vm.cards.postArray = results.data.results.data;
        vm.cards.next_page_url = results.data.results.next_page_url;
        vm.cards.prev_page_url = results.data.results.prev_page_url;
      })
      .catch(error => {
        console.log(error);
      })
    }
    }
}
</script>

<style lang="scss" scoped>

</style>