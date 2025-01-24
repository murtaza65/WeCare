<template>
  <top-nav></top-nav>
  <div class="container community-container">
    <h2 class="text-center wecare-logo">Community Support</h2>

    <!-- Search Bar -->
    <div class="search-bar">
      <input
        type="text"
        v-model="searchQuery"
        class="form-control"
        placeholder="Search members by name"
      />
    </div>

    <!-- Users with Same Goal -->
    <div v-for="(user, index) in filteredUsers" :key="index" class="user-card">
      <div class="user-info">
        <i class="fas fa-user-circle user-icon"></i>
        <div>
          <h4>{{ user.name }}</h4>
          <p>{{ user.goal }} - {{ user.progress }}% Progress</p>
        </div>
      </div>
      <div class="user-actions">
        <button class="btn btn-success" @click="engage(user)">Engage</button>
        <button class="btn btn-danger" @click="deleteUser(user)">Delete</button>
      </div>
    </div>

    <!-- Add More Button -->
    <a href="/community/add-members" class="btn btn-primary btn-lg btn-block">
      Add More Members
    </a>
  </div>
</template>

<script>
import TopNav from "./TopNav.vue";

export default {
  components: { TopNav },
  name: "CommunitySupport",
  data() {
    return {
      searchQuery: "",
      users: [
        {
          name: "John Doe",
          goal: "Daily Meditation",
          progress: 75,
        },
        {
          name: "Jane Smith",
          goal: "Exercise Routine",
          progress: 60,
        },
        {
          name: "Alice Brown",
          goal: "Reading Books",
          progress: 90,
        },
        {
          name: "Robert White",
          goal: "Healthy Eating",
          progress: 40,
        },
      ],
    };
  },
  computed: {
    // Filter users based on the search query
    filteredUsers() {
      return this.users.filter((user) =>
        user.name.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    },
  },
  methods: {
    engage(user) {
      // Engage with the user (open chat, send message, etc.)
      alert(`Engaging with ${user.name}`);
    },
    deleteUser(user) {
      // Delete the user from the community list
      const index = this.users.indexOf(user);
      if (index > -1) {
        this.users.splice(index, 1);
      }
      alert(`${user.name} has been removed from your community.`);
    },
    addUser() {
      // Simulate adding a new user (you could prompt for user details or fetch from an API)
      const newUser = {
        name: `New User ${this.users.length + 1}`,
        goal: "New Goal",
        progress: 0,
      };
      this.users.push(newUser);
      alert(`${newUser.name} has been added to your community.`);
    },
  },
};
</script>

<style scoped>
/* Dark Theme */
body {
  background-color: black;
  color: white;
}

/* Community Container */
.community-container {
  max-width: 800px;
  padding: 20px;
  margin-top: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
}

/* Header */
.wecare-logo {
  font-size: 28px;
  font-weight: bold;
  color: white;
  text-align: center;
}

/* Search Bar */
.search-bar {
  margin-bottom: 20px;
}

.search-bar input {
  background-color: #343a40;
  color: white;
  border: none;
  border-radius: 10px;
  padding: 10px;
  width: 100%;
}

/* User Card */
.user-card {
  background: #282828;
  padding: 15px;
  border-radius: 10px;
  margin-bottom: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.user-info {
  display: flex;
  align-items: center;
}

.user-icon {
  font-size: 40px;
  margin-right: 15px;
  color: white;
}

.user-actions button {
  margin-left: 10px;
}

.btn-success {
  background-color: #28a745;
  color: white;
}

.btn-danger {
  background-color: #dc3545;
  color: white;
}

.btn-primary {
  background-color: #007bff;
  color: white;
  margin-top: 20px;
}

/* Hover Effects for Buttons */
.btn-success:hover {
  background-color: #218838;
}

.btn-danger:hover {
  background-color: #c82333;
}

.btn-primary:hover {
  background-color: #0056b3;
}
</style>
