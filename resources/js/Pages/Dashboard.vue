<template>
  <top-nav></top-nav>
  <div class="container text-center mt-5">
    <!-- Top Header -->
    <div class="text-white text-center">
      <h1 class="fw-bold">Hi Maria</h1>
    </div>

    <!-- Icon Buttons Section -->
    <div class="row justify-content-center mt-4">
      <div class="col-4 col-md-2 text-center">
        <a
          class="btn btn-light rounded-circle p-3 shadow nav-link nav-item"
          href="/goals-progress"
        >
          <i class="fas fa-map-marker-alt fa-2x"></i>
        </a>
        <p class="mt-2">Your Goals & Progress</p>
      </div>

      <div class="col-4 col-md-2 text-center">
        <a href="/reminders" class="btn btn-light rounded-circle p-3 shadow">
          <i class="fas fa-bell fa-2x"></i>
        </a>
        <p class="mt-2">Reminders</p>
      </div>

      <div class="col-4 col-md-2 text-center">
        <a class="btn btn-light rounded-circle p-3 shadow" href="/community/support">
          <i class="fas fa-users fa-2x"></i>
        </a>
        <p class="mt-2">Community Support</p>
      </div>
    </div>

    <!-- Card Sections -->
    <div class="row justify-content-center mt-4">
      <div class="col-md-6">
        <div class="card shadow-sm p-3 mb-3" @click="navigate('ai_assistant')">
          <h4 class="fw-bold">AI Personal Assistant</h4>
          <p>Ask or tell me anything, and I'll remember!</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm p-3 mb-3" @click="navigate('behavior_tracker')">
          <h4 class="fw-bold">Behavior Tracker & Analyzer</h4>
          <p>Track and analyze your behaviors.</p>
        </div>
      </div>
    </div>

    <!-- Placeholder for Line Chart -->
    <div class="mt-4">
      <div class="card card-body body">
        <h5 class="text-white">User Progress Chart</h5>
        <canvas id="progressChart"></canvas>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from "vue";
import Chart from "chart.js/auto";
import TopNav from "./TopNav.vue";

export default {
  components: { TopNav },
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
