<template>
  <div class="container">
    <router-link class="nav-link" :to="{ name: 'home'}"></router-link>
      <div class="row">
          <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">Post</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <ul>
                        <li v-for="item in menuItem" :key="item.id">
                          <router-link class="nav-link" :to="{ name: item.routeName}">{{ item.label }}</router-link>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </nav>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  name : "Header",
  data() {
    return {
      menuItem: [
        {
          label: 'Home',
          routeName: 'home'
        },
        {
          label: 'Posts',
          routeName: 'posts'
        },
        {
          label: 'Chi Siamo',
          routeName: 'about'
        }
      ]
    }
  }

}
</script>

<style lang="scss" scoped>

</style>