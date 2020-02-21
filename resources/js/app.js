/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 // Complete SortableJS (with all plugins)
import Sortable from 'sortablejs/modular/sortable.complete.esm.js';

const app = new Vue({
    el: '#app',
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

 var el = document.getElementById('sortable-items');

    if(typeof(el) != 'undefined' && el != null){

         var sortable = new Sortable(el, {

         	 onSort: function (e) {
                   
                   var elemts = $('.draggable');

                   var idArrays = [];
              

					$( elemts ).each(function( index ) {

						idArrays.push($(this).data("id"));


					  
					});

				
								        
			        $.ajax({
				    type: "POST",
				    url: '/sort',
				    data: {idArrays},

				    success: function (data) {

				    	$('.ajax-success').html(` <div class="alert alert-success" role="alert">
                           `+data+`
                    </div>`);

				    },
				    error: function (data, textStatus, errorThrown) {
				        $('.ajax-success').html(` <div class="alert alert-success" role="alert">
                           `+textStatus+`
                    </div>`);

				    },
				});



			    },

         });
    }
