<template>
    <div class="">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="/products" class="nav-link">All product</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/add" class="nav-link">Add product</router-link>
                    </li>
                </ul>
            </div>
        </nav>
        <br/>

        <router-view></router-view>
    </div>
</template>

<script>
    export default {}
</script>
