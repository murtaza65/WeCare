<template>
  <top-nav></top-nav>
  <div class="container goals-container">
    <h2 class="text-center wecare-logo">Goals & Progress</h2>

    <!-- Goals List -->
    <div class="list-group">
      <div v-for="(goal, index) in goals" :key="index" class="goal-item">
        <div class="goal-info">
          <i :class="goal.icon" class="goal-icon"></i>
          <span>{{ goal.name }}</span>
        </div>
        <div class="progress goal-progress">
          <div
            class="progress-bar"
            :style="{ width: goal.progress + '%' }"
            role="progressbar"
            :aria-valuenow="goal.progress"
            aria-valuemin="0"
            aria-valuemax="100"
          >
            {{ goal.progress }}%
          </div>
        </div>
      </div>
    </div>

    <!-- Reminders Table -->
    <h3 class="text-center mt-4">Reminders</h3>
    <table class="table table-dark table-striped reminders-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Notification</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(reminder, index) in reminders" :key="index">
          <td>{{ index + 1 }}</td>
          <td>{{ reminder.message }}</td>
          <td>{{ reminder.time }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import TopNav from "./TopNav.vue";
export default {
  components: { TopNav },
  name: "GoalsAndReminders",
  data() {
    return {
      goals: [
        { name: "Daily Meditation", progress: 75, icon: "fas fa-spa" },
        { name: "Exercise Routine", progress: 60, icon: "fas fa-dumbbell" },
        { name: "Healthy Eating", progress: 40, icon: "fas fa-apple-alt" },
        { name: "Reading Books", progress: 90, icon: "fas fa-book" },
      ],
      reminders: [
        { message: "Drink Water", time: "08:00 AM" },
        { message: "Workout Session", time: "10:00 AM" },
        { message: "Take Medication", time: "02:00 PM" },
        { message: "Evening Walk", time: "06:00 PM" },
      ],
    };
  },
};
</script>

<style scoped>
/* Dark Theme */
body {
  background-color: black;
  color: white;
}

/* Goals Container */
.goals-container {
  max-width: 700px;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
  margin-top: 20px;
}

/* Header */
.wecare-logo {
  font-size: 28px;
  font-weight: bold;
  color: white;
  text-align: center;
}

/* Goal List */
.goal-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: white;
  padding: 12px;
  margin-bottom: 10px;
  border-radius: 10px;
}

/* Goal Icons */
.goal-info {
  display: flex;
  align-items: center;
}

.goal-icon {
  font-size: 24px;
  margin-right: 10px;
  color: black;
}

.goal.name {
  font-size: 24px;
  margin-right: 10px;
  color: black;
}

/* Progress Bar */
.goal-progress {
  width: 50%;
}

.progress-bar {
  background-color: #007bff;
  color: white;
  font-weight: bold;
  text-align: center;
}

/* Reminders Table */
.reminders-table {
  margin-top: 20px;
  background-color: black;
}
</style>
