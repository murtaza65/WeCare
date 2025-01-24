<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
      <div class="container-fluid">
        <!-- Logo / Brand -->
        <a href="/" class="navbar-brand wecare-logo"> WeCare </a>

        <!-- Navbar Toggle (for mobile) -->
        <button
          class="bg-white navbar-toggler"
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
              <router-link to="/profile" class="nav-link">
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
  <div class="container text-center mt-5">
    <!-- Top Header -->
    <div class="text-white text-center">
      <h1 class="fw-bold">Hi Maria</h1>
    </div>

    <!-- Icon Buttons Section -->
    <div class="row justify-content-center mt-4">
      <div class="col-4 col-md-2 text-center">
        <button
          class="btn btn-light rounded-circle p-3 shadow"
          @click="navigate('goals')"
        >
          <i class="fas fa-map-marker-alt fa-2x"></i>
        </button>
        <p class="mt-2">Your Goals & Progress</p>
      </div>

      <div class="col-4 col-md-2 text-center">
        <button
          class="btn btn-light rounded-circle p-3 shadow"
          @click="navigate('reminders')"
        >
          <i class="fas fa-bell fa-2x"></i>
        </button>
        <p class="mt-2">Reminders</p>
      </div>

      <div class="col-4 col-md-2 text-center">
        <button
          class="btn btn-light rounded-circle p-3 shadow"
          @click="navigate('community')"
        >
          <i class="fas fa-users fa-2x"></i>
        </button>
        <p class="mt-2">Community Support</p>
      </div>
    </div>

    <!-- Card Sections -->
    <div class="row justify-content-center mt-4">
      <div class="col-md-6">
        <a class="nav-link item" href="/chat">
          <div class="card shadow-sm p-3 mb-3" @click="navigate('ai_assistant')">
            <h4 class="fw-bold">AI Personal Assistant</h4>
            <p>Ask or tell me anything, and I'll remember!</p>
          </div>
        </a>
      </div>
      <div class="col-md-6">
        <a class="nav-link item" href="/chat">
          <div class="card shadow-sm p-3 mb-3" @click="navigate('behavior_tracker')">
            <h4 class="fw-bold">Behavior Tracker & Analyzer</h4>
            <p>Track and analyze your behaviors.</p>
          </div>
        </a>
      </div>
    </div>

    <!-- Placeholder for Line Chart -->
    <div class="mt-4">
      <h5 class="text-white">User Progress Chart</h5>
      <canvas id="progressChart"></canvas>
    </div>
  </div>
</template>

<script>
import { onMounted } from "vue";
import Chart from "chart.js/auto";

export default {
  methods: {
    navigate(route) {
      console.log("Navigating to:", route);
      // Replace with actual Vue Router navigation if needed
    },
  },
  setup() {
    onMounted(() => {
      // Initialize Chart.js
      const ctx = document.getElementById("progressChart").getContext("2d");
      new Chart(ctx, {
        type: "line",
        data: {
          labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5"],
          datasets: [
            {
              label: "Progress",
              data: [40, 90, 0, 60, 10],
              borderColor: "blue",
              fill: false,
            },
          ],
        },
        options: { responsive: true },
      });
    });
  },
};
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
.nav-link.item {
  text-decoration: none;
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
