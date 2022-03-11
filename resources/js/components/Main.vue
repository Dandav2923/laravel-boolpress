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
  </div>
</template>

<script>

export default {
  name : "Main",
  props: ['cards']
}
</script>

<style lang="scss" scoped>

</style>