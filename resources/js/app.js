
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#chat-container',
    data: {
        userLogin: {
            user_id: 1,
            username: 'kevocode',
            image: 'http://app.rettiwt.local/images/profile-image-1.jpg'
        },
        posts: [
            {
                post_id: 1,
                user: {
                    username: 'kevocode',
                    image: 'http://app.rettiwt.local/images/profile-image-1.jpg'
                },
                content: 'Estoy preparando una idea grandiosa que cambiará el mundo entero..., más detalles pronto!!!'
            }
        ],
        formPost: {
            content: '',
        },
        errors: []
    },
    methods: {
        createPost: function (ev) {
            if (this.formPost.content.trim().length > 140) {
                this.errors = [
                    { message: 'Solo dispone de 140 caracteres para el post.' }
                ]
                this.resetErrors(5000)
            } else if (this.formPost.content.trim().length == 0) {
                this.errors = [
                    { message: 'Debe escribir algo de contenido para el post.' }
                ]
                this.resetErrors(5000)
            } else {
                this.posts.unshift({
                    user: this.userLogin,
                    content: this.formPost.content
                })
                this.formPost.content = ''
            }
            ev.preventDefault()
        },
        resetErrors: function (time) {
            setTimeout(() => {
                this.errors = []
            }, time)
        }
    }
});
