<template>
  <div class="container">
      <div class="row row-cols-3">
          <div class="col" 
            v-for="(post , index) in cards.postArray" :key="index" >
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

export default {
  name : "Main",
  props: ['cards'],
  methods:{
    changePage(vs) {
        this.$emit('changePage', vs);
      }
  }
}
</script>

<style lang="scss" scoped>

</style>