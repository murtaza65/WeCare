<template>
  <top-nav></top-nav>
  <div class="container add-members-container">
    <h2 class="text-center wecare-logo">Add Community Members</h2>

    <!-- Search Bar -->
    <div class="search-bar">
      <input
        type="text"
        v-model="searchQuery"
        class="form-control"
        placeholder="Search members by name"
      />
    </div>

    <!-- Members List -->
    <div v-for="(member, index) in filteredMembers" :key="index" class="member-card">
      <div class="member-info">
        <i class="fas fa-user-circle member-icon"></i>
        <div>
          <h4>{{ member.name }}</h4>
          <p>{{ member.goal }} - {{ member.progress }}% Progress</p>
        </div>
      </div>
      <div class="member-actions">
        <button class="btn btn-primary" @click="addMember(member)">Add</button>
      </div>
    </div>
  </div>
</template>

<script>
import TopNav from "./TopNav.vue";

export default {
  components: { TopNav },
  name: "AddCommunityMembers",
  data() {
    return {
      searchQuery: "",
      members: [
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
    // Filter members based on the search query
    filteredMembers() {
      return this.members.filter((member) =>
        member.name.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    },
  },
  methods: {
    addMember(member) {
      // Simulate adding the member to your community (e.g., API request or local storage)
      alert(`${member.name} has been added to your community.`);
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

/* Add Members Container */
.add-members-container {
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

/* Member Card */
.member-card {
  background: #282828;
  padding: 15px;
  border-radius: 10px;
  margin-bottom: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.member-info {
  display: flex;
  align-items: center;
}

.member-icon {
  font-size: 40px;
  margin-right: 15px;
  color: white;
}

.member-actions button {
  margin-left: 10px;
}

.btn-primary {
  background-color: #007bff;
  color: white;
  margin-left: 15px;
}

/* Hover Effects for Buttons */
.btn-primary:hover {
  background-color: #0056b3;
}
</style>
