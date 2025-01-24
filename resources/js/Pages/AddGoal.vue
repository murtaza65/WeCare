<template>
  <div>
    <top-nav></top-nav>
  </div>
  <div class="container goal-add-container">
    <h2 class="text-center wecare-logo">Add New Goal</h2>

    <form @submit.prevent="addGoal">
      <div class="form-group">
        <label for="goalName">Goal Name</label>
        <input
          type="text"
          v-model="newGoal.name"
          id="goalName"
          class="form-control"
          placeholder="Enter goal name"
          required
        />
      </div>

      <div class="form-group">
        <label for="goalIcon">Goal Icon</label>
        <select v-model="newGoal.icon" id="goalIcon" class="form-control" required>
          <option value="fas fa-spa">Meditation</option>
          <option value="fas fa-dumbbell">Exercise</option>
          <option value="fas fa-apple-alt">Healthy Eating</option>
          <option value="fas fa-book">Reading</option>
        </select>
      </div>

      <div class="form-group">
        <label for="goalProgress">Goal Progress (%)</label>
        <input
          type="number"
          v-model="newGoal.progress"
          id="goalProgress"
          class="form-control"
          min="0"
          max="100"
          required
        />
      </div>

      <div class="form-group">
        <label for="goalDescription">Goal Description</label>
        <textarea
          v-model="newGoal.description"
          id="goalDescription"
          class="form-control"
          placeholder="Add a brief description of the goal"
        ></textarea>
      </div>

      <div class="card-body">
        <button type="submit" class="btn btn-success btn-lg btn-block">Add Goal</button>
        <a href="/goals-progress" class="btn btn-danger btn-lg btn-block mx-4">
          Cancel
        </a>
      </div>
    </form>
  </div>
</template>

<script>
import TopNav from "./TopNav.vue";

export default {
  components: { TopNav },
  name: "GoalAdd",
  data() {
    return {
      newGoal: {
        name: "",
        icon: "fas fa-spa", // default icon
        progress: 0,
        description: "",
      },
    };
  },
  methods: {
    addGoal() {
      // Add the new goal to the goals list (here we could make an API call)
      this.$emit("goalAdded", this.newGoal); // Emit the new goal to parent component
      this.$router.push("/goals-progress"); // Navigate back to Goals & Progress page
    },
    cancel() {
      this.$router.push("/goals-progress"); // Navigate back to Goals & Progress page
    },
  },
};
</script>

<style scoped>
/* Dark theme background */
body {
  background-color: black;
  color: white;
}

/* Goal Add Container */
.goal-add-container {
  max-width: 800px;
  padding: 20px;
  margin-top: 30px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
}

/* Form Labels and Inputs */
.form-group {
  margin-bottom: 20px;
}

label {
  font-size: 18px;
  color: white;
}

input,
textarea,
select {
  background-color: #343a40;
  color: white;
  border: none;
  border-radius: 10px;
  padding: 10px;
  width: 100%;
}

textarea {
  min-height: 100px;
}

/* Button Styles */
.btn {
  border-radius: 10px;
  font-size: 16px;
}

.btn-success {
  background-color: #28a745;
}

.btn-danger {
  background-color: #dc3545;
}

.btn-success:hover {
  background-color: #218838;
}

.btn-danger:hover {
  background-color: #c82333;
}
</style>
