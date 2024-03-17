<template>
  <div>
    <!-- Display the sum of regellement where it equals 1 -->
    <div>Sum of Regellement (1): {{ sumMontantP }}</div>

    <!-- Your existing table for displaying GestionOps -->
    <div class="card">
      <!-- Table content as per your existing code -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      sumMontantP: 0 // Initialize sumMontantP
    };
  },
  mounted() {
    // Fetch the sum of regellement from your API endpoint
    this.fetchSumMontantP();
  },
  methods: {
    fetchSumMontantP() {
      // Make an API request to fetch the sum of regellement
      // Assuming you have an API endpoint to fetch the sum, replace 'api/sum-regellement' with your actual endpoint
      fetch('api/sum-regellement')
        .then(response => response.json())
        .then(data => {
          this.sumMontantP = data.sumMontantP; // Update sumMontantP with the fetched value
        })
        .catch(error => {
          console.error('Error fetching sum of regellement:', error);
        });
    }
  }
};
</script>

<style scoped>
/* Your component-specific styles */
</style>
