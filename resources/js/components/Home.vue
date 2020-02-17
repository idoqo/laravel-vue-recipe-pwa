<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" v-for="recipe,index in recipes" :key="recipe.id">
                <div class="my-4">
                    <h5>
                        <router-link :to="{ name: 'recipe', params: {recipeId: recipe.id}}">
                            {{recipe.title}}
                        </router-link>
                    </h5>
                    <small class="text-muted">Posted on: {{recipe.created_at}}</small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data(){
            return {
              recipes: []
            }
        },

        mounted() {
            axios.defaults.headers.common['Content-type'] = "application/json";
            axios.defaults.headers.common['Accept'] = "application/json";

            axios.get('api/recipes').then(response => {
                response.data.forEach((data) => {
                    this.recipes.push({
                        id: data.id,
                        body: data.body.slice(0, 100) + '...',
                        created_at: data.created_at,
                        title: data.title
                    })
                });
            })
        }
    }
</script>
