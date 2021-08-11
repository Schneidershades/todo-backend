<template>
  <div class="justify-content-center">
    <div class="card-header">Subscriber List</div>
    <div id="subscriber-list" class="list-group">
      <a
        v-for="subscriber in subscribers"
        v-bind:key="subscriber.id"
        href="#"
        class="list-group-item list-group-item-action"
        v-on:click="$emit('subscriber-selected', subscriber)"
      >{{subscriber.name}}</a>
    </div>
    <button class="btn btn-primary" v-on:click="addSubscriber">Add Subscriber</button>
  </div>
</template>

<script>
export default {
  props: ["subscribers"],
  methods: {
    addSubscriber: function() {
      if (this.subscribers.some(subscriber => !subscriber.id)) return;
      const newSubscriber = {
        id: null,
        email_address: null,
        name: "New Subscriber",
        fields: []
      };
      this.subscribers.push(newSubscriber);
      this.$emit("subscriber-selected", newSubscriber);
    }
  }
};
</script>
