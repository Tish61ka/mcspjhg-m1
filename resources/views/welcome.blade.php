<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('./css/bootstrap.min.css') }}">
</head>

<body class="container py-3" >
    <div id="app">
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
</body>

<script src="{{ asset('./js/vue.js') }}"></script>
<script src="{{ asset('./js/vue-router.js') }}"></script>
<script type="module">
    import Index from './js/components/Index.js';
    import Login from './js/components/Login.js';
    import Registration from './js/components/Registration.js';
    import Orders from './js/components/Orders.js';
    import Cart from './js/components/Cart.js';

    Vue.component('header-component', {
        data() {
            return {

            }
        },
        template: `<header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <router-link class="d-flex align-items-center text-dark text-decoration-none" to="/">
            <span class="fs-4">«Самоход»</span>
        </router-link>

        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <router-link class="me-3 py-2 text-dark text-decoration-none" to="/registration">Регистрация</router-link>
            <router-link class="me-3 py-2 text-dark text-decoration-none" to="/login">Авторизация</router-link>
            <router-link class="me-3 py-2 text-dark text-decoration-none" to="/orders">Мои заказы</router-link>
            <router-link class="me-3 py-2 text-dark text-decoration-none" to="/cart">Корзина</router-link>
        </nav>
    </div>
</header>`
    });
    Vue.component('footer-component', {
        data() {
            return {

            }
        },
        template: `<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
        <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted">&copy; 2017–2021</small>
        </div>
    </div>
</footer>`
    })

    const routes = [
        {
            path: '/',
            component: Index,
        },
        {
            path: '/login',
            component: Login,
        },
        {
            path: '/registration',
            component: Registration,
        },
        {
            path: '/orders',
            component: Orders,
        },
        {
            path: '/cart',
            component: Cart,
        },
    ];

    new Vue({
        data() {
            return {
                message: 'hello'
            }
        },
        el: '#app',
        components:{
            Index,
        },
        router: new VueRouter({
            mode: 'history',
            routes,
        })
    })
</script>

</html>