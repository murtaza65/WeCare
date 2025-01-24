<template>
  <div>
    <top-nav></top-nav>
  </div>
  <div class="container goals-container">
    <h2 class="text-center wecare-logo">Goals & Progress</h2>

    <div class="list-group">
      <div
        v-for="(goal, index) in goals"
        :key="index"
        class="goal-item"
        @mouseover="goalHovered(index)"
        @mouseleave="goalLeft(index)"
      >
        <div class="goal-info">
          <i :class="goal.icon" class="goal-icon"></i>
          <span class="goal-name">{{ goal.name }}</span>
        </div>
        <div class="progress goal-progress">
          <div
            class="progress-bar"
            :style="{ width: goal.progress + '%', transition: 'width 0.8s ease-in-out' }"
            role="progressbar"
            :aria-valuenow="goal.progress"
            aria-valuemin="0"
            aria-valuemax="100"
          >
            {{ goal.progress }}%
          </div>
        </div>

        <!-- Like, Comment, and Delete buttons -->
        <div class="goal-actions">
          <button @click="toggleLike(index)" class="btn btn-light btn-sm">
            <i :class="goal.liked ? 'fas fa-heart' : 'far fa-heart'"></i>
          </button>
          <button @click="deleteGoal(index)" class="btn btn-danger btn-sm">Delete</button>
        </div>

        <!-- Comment Section -->
        <div v-if="goal.showComments">
          <input
            v-model="goal.newComment"
            type="text"
            class="form-control mt-2"
            placeholder="Add a comment..."
          />
          <button @click="addComment(index)" class="btn btn-primary btn-sm mt-2">
            Add Comment
          </button>

          <div v-if="goal.comments.length > 0" class="mt-3">
            <ul class="list-group">
              <li
                v-for="(comment, idx) in goal.comments"
                :key="idx"
                class="list-group-item"
              >
                {{ comment }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Goal Button -->
    <a href="/goals/add-goal" class="btn btn-success btn-lg mt-4">Add New Goal</a>
  </div>
</template>

<script>
import TopNav from "./TopNav.vue";

export default {
  components: { TopNav },
  name: "GoalsProgress",
  data() {
    return {
      goals: [
        {
          name: "Daily Meditation",
          progress: 75,
          icon: "fas fa-spa",
          liked: false,
          comments: [],
          newComment: "",
          showComments: false,
        },
        {
          name: "Exercise Routine",
          progress: 60,
          icon: "fas fa-dumbbell",
          liked: false,
          comments: [],
          newComment: "",
          showComments: false,
        },
        {
          name: "Healthy Eating",
          progress: 40,
          icon: "fas fa-apple-alt",
          liked: false,
          comments: [],
          newComment: "",
          showComments: false,
        },
        {
          name: "Reading Books",
          progress: 90,
          icon: "fas fa-book",
          liked: false,
          comments: [],
          newComment: "",
          showComments: false,
        },
      ],
    };
  },
  methods: {
    goalHovered(index) {
      this.goals[index].hovered = true;
    },
    goalLeft(index) {
      this.goals[index].hovered = false;
    },
    toggleLike(index) {
      this.goals[index].liked = !this.goals[index].liked;
    },
    deleteGoal(index) {
      this.goals.splice(index, 1);
    },
    addComment(index) {
      if (this.goals[index].newComment.trim()) {
        this.goals[index].comments.push(this.goals[index].newComment);
        this.goals[index].newComment = "";
      }
    },
    addNewGoal() {
      const newGoal = {
        name: "New Goal",
        progress: 0,
        icon: "fas fa-tasks",
        liked: false,
        comments: [],
        newComment: "",
        showComments: false,
      };
      this.goals.push(newGoal);
    },
  },
  mounted() {
    this.randomProgressUpdate();
  },
  methods: {
    randomProgressUpdate() {
      setInterval(() => {
        this.goals.forEach((goal) => {
          if (goal.progress < 100) {
            goal.progress = Math.min(100, goal.progress + Math.floor(Math.random() * 10));
          }
        });
      }, 2000); // Updates every 2 seconds
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

/* Goals Container */
.goals-container {
  max-width: 800px;
  padding: 20px;
  margin-top: 30px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
}

/* Goal Item */
.goal-item {
  background: #282828;
  padding: 15px;
  border-radius: 10px;
  margin-bottom: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: transform 0.3s ease;
}

.goal-item:hover {
  transform: scale(1.05);
}

.goal-info {
  display: flex;
  align-items: center;
}

.goal-icon {
  font-size: 30px;
  margin-right: 15px;
  color: white;
}

.goal-name {
  font-size: 18px;
  color: white;
}

/* Progress Bar */
.progress {
  background-color: #343a40;
  border-radius: 50px;
  height: 10px;
  width: 100%;
}

.progress-bar {
  height: 100%;
  background-color: #28a745;
  border-radius: 50px;
  text-align: center;
  line-height: 10px;
  color: white;
  font-weight: bold;
  transition: width 0.8s ease-in-out;
}

/* Hover Effects */
.goal-item:hover .goal-name {
  color: #f8f9fa;
}

.goal-item:hover .progress-bar {
  background-color: #ffc107;
}

.goal-actions {
  display: flex;
  gap: 10px;
  margin-top: 10px;
}

.goal-actions button {
  border-radius: 50px;
}

.goal-actions button i {
  font-size: 18px;
}

.add-goal-btn {
  width: 100%;
  background-color: #28a745;
  color: white;
  font-size: 16px;
  border-radius: 50px;
}

.add-goal-btn:hover {
  background-color: #218838;
}

.comment-section {
  margin-top: 10px;
}

.comment-section input {
  width: 100%;
}
</style>
