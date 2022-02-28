require("babel-polyfill");

window.$ = window.jQuery = require('jquery');
window.moment = require('moment');
window.numbro = require('numbro');
window.swal = require('sweetalert2');
window.pluralize = require('pluralize');
window._ = require('lodash');

// window.helpers = require('./helpers').default;

require('./vue');

import PerfectScrollbar from 'perfect-scrollbar';

/////////////////////
// Configure Axios //
/////////////////////

import ajaxErrorHandler from './errorHandler';
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.interceptors.response.use(response => response, (error) => {
    ajaxErrorHandler(error.response.status, error.response.data);
    throw error; // rethrow error to ensure any further promise chain is rejected.
});

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found.');
}


// On every page load
document.addEventListener('DOMContentLoaded', () => {
    // Try load the page-specific viewmodel if one available
    var vmClass = typeof Viewmodel === 'function' ? Viewmodel : Vue;
    new vmClass({
        el: '#app',
        data: globals.pagedata || {}
    });

    // Fade in to prevent flash of unstyled content
    setTimeout(() => document.getElementById("layout").classList.remove('loading'), 200); 
});