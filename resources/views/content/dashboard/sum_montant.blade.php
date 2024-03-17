<template>
  <div>
    <input type="hidden" id="sumZeroValue" :value="sumZero">
    <!-- Display the sum of regellement where it equals 1 -->
    <div v-if="loading">Loading...</div>
    <div v-else>
      <p>Sum of montant where regellement is 0: {{ sumZero }}</p>
      <p>Sum of montant where regellement is 1: {{ sumOne }}</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      sumZero: null,
      sumOne: null,
      loading: true
    };
  },
  mounted() {
    // Make HTTP request to your Laravel endpoint
    axios.get('/api/sum-montant-regellement-yes')
      .then(response => {
        this.sumZero = response.data.sumZero;
        this.sumOne = response.data.sumOne;
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      })
      .finally(() => {
        this.loading = false;
        // Emit a custom event to notify the parent component that the data has been loaded
        this.$emit('data-loaded');
      });
  }
};
</script>
