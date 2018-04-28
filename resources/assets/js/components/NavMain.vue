<template>
  <!-- START NAV -->
  <nav class="navbar is-white">
    <div class="container">
      <div class="navbar-brand">
        <router-link :to="{ name: 'home' }" class="navbar-item">Boilerplate</router-link>
        <div class="navbar-burger burger" data-target="navMenu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div id="navMenu" class="navbar-menu">
        <div class="navbar-end">
          <router-link :to="{ name: 'login' }" class="navbar-item">Login</router-link>
          <router-link :to="{ name: 'register' }" class="navbar-item">Register</router-link>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Iberno Hoffmann
            </a>

            <div class="navbar-dropdown">
              <a class="navbar-item">
                Overview
              </a>
              
              <hr class="navbar-divider">
              <a class="navbar-item">
                Logout
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </nav>
</template>
<script>

    export default {
        
    }
</script>