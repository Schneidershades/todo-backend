<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <subscriber-list
            v-bind:subscribers="subscribers"
            v-on:subscriber-selected="selectedSubscriber = $event"
          ></subscriber-list>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <subscriber-form
            v-if="selectedSubscriber"
            v-bind:selected-subscriber="selectedSubscriber"
            v-on:subscriber-deleted="onSubscriberDeleted($event)"
            v-on:selected-subscriber-updated="onSelectedSubscriberUpdated($event)"
          ></subscriber-form>
        </div>
      </div>
    </div>
    <br />
  </div>
</template>

<script>
export default {
  mounted() {
    this.getSubscribers();
  },
  data: function() {
    return {
      activeComponent: "subscriber-list",
      selectedSubscriber: null,
      subscribers: []
    };
  },
  methods: {
    getSubscribers: async function() {
      const response = await this.$http.get("/api/subscribers");
      this.subscribers = response.data;
    },
    onSubscriberDeleted: async function(deletedSubscriber) {
      if (!deletedSubscriber.id) {
        this.subscribers.pop();
        this.selectedSubscriber = null;
        return;
      }
      try {
        await this.$http.delete(`/api/subscribers/${deletedSubscriber.id}`);
        this.$emit("subscriber-deleted", deletedSubscriber);
        this.subscribers = this.subscribers.filter(
          subscriber => subscriber.id !== deletedSubscriber.id
        );
        this.selectedSubscriber = null;
      } catch (error) {
        alert(error.message);
      }
    },
    onSelectedSubscriberUpdated: function(updatedSelectedSubscriber) {
      this.selectedSubscriber = updatedSelectedSubscriber;
    }
  }
};
</script>
