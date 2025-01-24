<template>
  <div>
    <top-nav></top-nav>
  </div>
  <div class="container chat-container">
    <!-- Chat Window -->
    <div class="chat-box">
      <div
        v-for="(message, index) in messages"
        :key="index"
        class="message"
        :class="message.sender"
      >
        <div class="msg-bubble">
          <i :class="message.sender === 'user' ? 'fas fa-user' : 'fas fa-robot'"></i>
          <p>{{ message.text }}</p>
        </div>
      </div>
    </div>

    <!-- User Input -->
    <div class="input-group mt-3">
      <input
        v-model="userInput"
        type="text"
        class="form-control"
        placeholder="Type a message..."
        @keyup.enter="sendMessage"
      />
      <button @click="sendMessage" class="btn btn-primary">
        <i class="fas fa-paper-plane"></i>
      </button>
    </div>
  </div>
</template>

<script>
import TopNav from "./TopNav.vue";
export default {
  components: { TopNav },
  name: "ChatPage",
  data() {
    return {
      userInput: "",
      messages: [{ text: "Hello! How can I help you today?", sender: "bot" }],
    };
  },
  methods: {
    sendMessage() {
      if (this.userInput.trim() !== "") {
        // Add user message to chat
        this.messages.push({ text: this.userInput, sender: "user" });

        // Simulate AI response
        setTimeout(() => {
          this.messages.push({
            text: "I'm an AI bot! I'll respond better when connected to the backend.",
            sender: "bot",
          });

          // Auto-scroll to the latest message
          this.$nextTick(() => {
            this.scrollToBottom();
          });
        }, 1000);

        // Clear input field
        this.userInput = "";
      }
    },
    scrollToBottom() {
      const chatBox = document.querySelector(".chat-box");
      chatBox.scrollTop = chatBox.scrollHeight;
    },
  },
};
</script>

<style scoped>
/* Home View Styling */
body {
  background-color: black;
  color: white;
}

/* Chat Container */
.chat-container {
  max-width: 900px;
  background: black;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
  display: flex;
  flex-direction: column;
  height: 80vh;
  margin-top: 20px;
}

/* Chat Header */
.wecare-logo {
  font-size: 28px;
  font-weight: bold;
  color: white;
  text-align: center;
}

/* Chat Box */
.chat-box {
  flex-grow: 1;
  overflow-y: auto;
  border: 1px solid #fff;
  border-radius: 10px;
  background: black;
  display: flex;
  flex-direction: column;
  padding: 15px;
}

/* Message Styling */
.message {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

/* Message Bubbles */
.msg-bubble {
  max-width: 70%;
  padding: 10px;
  border-radius: 15px;
  word-wrap: break-word;
  display: flex;
  align-items: center;
  box-shadow: 2px 2px 5px rgba(255, 255, 255, 0.1);
}

/* Alternate Message Positions */
.user {
  align-self: flex-end;
  justify-content: flex-end;
  min-width: 50%;
}

.bot {
  align-self: flex-start;
  justify-content: flex-start;
}

/* User Messages */
.user .msg-bubble {
  background-color: #007bff;
  color: white;
  text-align: right;
}

.user .msg-bubble i {
  margin-left: 10px;
}

/* Bot Messages */
.bot .msg-bubble {
  background-color: white;
  color: black;
  text-align: left;
}

.bot .msg-bubble i {
  margin-right: 10px;
}

/* Input Styling */
.input-group input {
  border-radius: 20px;
  background-color: black;
  color: white;
  border: 1px solid white;
}

.input-group input::placeholder {
  color: #ccc;
}

.btn-primary {
  border-radius: 50%;
  background-color: white;
  color: black;
  border: 1px solid white;
}

.btn-primary:hover {
  background-color: #f8f9fa;
  color: black;
}
</style>
