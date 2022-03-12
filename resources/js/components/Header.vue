<template>
  <div class="container">
      <div class="row">
          <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <ul class="list-group list-group-horizontal">
                        <li v-for="item in menuItem" :key="item.id" class="list-group-item">
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