<template>
  <div class="container">
      <div class="row row-cols-3">
          <div class="col" 
            v-for="(post , index) in postArray" :key="index" >
            <div class="card">
              <h4>{{ post.title }}</h4>
              <p>{{ post.content }}</p>
            </div>
          </div>
      </div>
  </div>
</template>

<script>
import Axios from 'axios';
export default {
  name : "Main",
  data() {
        return{
            postArray: null,
            next_page_url: null,
            prev_page_url: null
        }
    },
    created() {
      const vm = this;
      Axios.get('http://127.0.0.1:8000/api/posts')
      .then(results => {
        vm.postArray = results.data.results.data;
        vm.next_page_url = results.data.next_page_url;
        vm.prev_page_url = results.data.prev_page_url;
      })
      .catch(error => {
        console.log(error);
      })
    }
}
</script>

<style lang="scss" scoped>

</style>