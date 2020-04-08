<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my-4">
                    <h4>{{ recipe.title }}</h4>
                    <div v-html="recipe.body"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            recipe: {}
        }
    },

    mounted() {
        axios.defaults.headers.common['Content-type'] = "application/json";

        axios.defaults.headers.common['Accept'] = "application/json";
        let recipeUrl = `/api/recipes/${this.$route.params.recipeId}`;
        axios.get(recipeUrl).then(response => {
            this.recipe = response.data;
        })
    }
}
</script>
