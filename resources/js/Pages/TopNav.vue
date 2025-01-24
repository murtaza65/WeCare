<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
      <div class="container-fluid">
        <!-- Logo / Brand -->
        <a href="/dashboard" class="navbar-brand wecare-logo"
          ><i class="fa fa-arrow-left"></i> WeCare
        </a>

        <!-- Navbar Toggle (for mobile) -->
        <button
          class="bg-white navbar-toggler dropdown"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/user/profile" class="nav-link">
                <i class="fas fa-user"></i> Profile
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/logout" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
export default {};
</script>

<style>
/* Custom Branding */
.wecare-logo {
  font-size: 28px;
  font-weight: bold;
  color: white !important;
}

/* Navbar Hover Effects */
.nav-link {
  font-size: 18px;
}
.nav-link:hover {
  text-decoration: underline;
}
body {
  background-color: black;
  color: white;
}
.card {
  cursor: pointer;
  background-color: white;
}
.card:hover {
  background-color: #f8f9fa;
}
</style>
