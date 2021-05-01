<template>
<div>
    <h1>Property List</h1>
    <div v-for="property in properties">
        {{property.name}}
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return {
                properties: []
            }
        },
       async mounted() {
           const result = await axios.get('/api/properties');
           this.properties = result.data;
           console.log(this.properties);

       }
    }
</script>

