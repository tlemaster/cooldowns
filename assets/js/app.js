/**
 * file: app.js
 * author: Todd LeMaster
 */
import Vue from 'vue';
import Example from './components/Example'

/** require('../css/main.scss'); */
require('../../node_modules/bulma/bulma.sass')
require('../css/main.css');

/**
 * Create a fresh Vue Application instance
 */
new Vue({
   el: '#app',
   components: {Example}
});