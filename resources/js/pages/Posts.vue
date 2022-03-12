<template>
  <div class="container">
      <div class="row">
          <div class="col" v-for="(post, index) in cards.postArray" :key="index">
            <div class="card">
              <h4>{{ post.title }}</h4>
              <p>{{ post.content }}</p>
            </div>
          </div>
      </div>
      <div class="row mt-3 bg-light" v-if="cards.prev_page_url || cards.next_page_url">
        <ul class="list-inline bg-light p-2">
          <li class="list-inline-item">
            <button v-if="cards.prev_page_url" class="btn btn-primary" @click="changePage('prev_page_url')">Prev
            </button>
          </li>
          <li class="list-inline-item">
            <button v-if="cards.next_page_url" class="btn btn-primary" @click="changePage('next_page_url')">Next
            </button>
          </li>
        </ul>
      </div>
  </div>
</template>

<script>
import Axios from 'axios';
export default {
  name : "Posts",
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
      this.getPosts('http://127.0.0.1:8000/api/posts/random');
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

<style>

</style>