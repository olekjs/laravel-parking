Vue.component('reservation', require('./components/Reservation.vue'));

const reservation = new Vue({
	el: '#app',
	data: {
		reservations: []
	},
});