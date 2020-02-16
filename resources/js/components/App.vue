<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link :to="{name: 'home'}" class="navbar-brand">Recipe PWA</router-link>
                <button class="navbar-toggler" type="button" dat-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <router-link :to="{name: 'home'}" class="nav-link">Recipes</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="py-4">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
