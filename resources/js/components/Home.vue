<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" v-for="recipe,index in recipes" :key="recipe.id">
                <div class="card">
                    <h4 class="card-header">{{recipe.title}}</h4>
                    <div class="card-body">
                        <p class="card-text">{{recipe.body}}</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
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
                        title: data.title
                    })
                });
            })
        }
    }
</script>
