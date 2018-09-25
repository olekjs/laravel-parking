<template>
	<div>
		<div class="card mb-2">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<label for="customerFirstName">Type customer first name:</label>
						<input type="text" id="customerFirstName" v-model="customerFirstName" class="form-control">
					</div>
					<div class="col-md-3">
						<label for="customerLastName">Type customer last name:</label>
						<input type="text" id="customerLastName" v-model="customerLastName" class="form-control">
					</div>
					<div class="col-md-3">
						<label for="date">Type date:</label>
						<input type="date" id="date" v-model="date" class="form-control">
					</div>
					<div class="col-md-3 clear-btn">
						<button v-on:click="getReservations" class="btn btn-secondary">Clear form</button>
					</div>
				</div>
			</div>
		</div>
		<div v-if="reservations.length === 0">
			<div class="card">
				<div class="card-body">
					No result
				</div>
			</div>
		</div>
		<table v-else class="table table-middle-aligned table-hover">
			<thead class="thead-dark">
			    <tr>
			        <th>Customer</th>
			        <th>Date of booking start</th>
					<th>Date of booking ending</th>
					<th>Date of created</th>
					<th>Payment status</th>
					<th>Phone number</th>
					<th>Email</th>
					<th></th>
			    </tr>
			</thead>
			<tbody v-for="reservation in reservations">
	    		<td>{{ reservation.customer.first_name + ' ' + reservation.customer.last_name }}</td>
	    		<td>{{ reservation.from }}</td>
	    		<td>{{ reservation.to }} {{ getType(reservation.to) }}</td>
	    		<td>{{ reservation.created_at }}</td>
	    		<td>{{ reservation.payment_status }}</td>
	    		<td>{{ reservation.customer.phone }}</td>
	    		<td>{{ reservation.customer.email }}</td>
	    		<td><a :href="'/admin/reservation/show/' + reservation.id" class="btn btn-secondary"> Show</a></td>
			</tbody>
		</table>
	</div>
</template>
<style scoped>
	.clear-btn {
		margin-top: 30px;
	}
</style>
<script>
Vue.use(require('vue-moment'));
import moment from 'moment';

export default {
    data: function() {
        return {
			reservations: [],
			customerFirstName: '',
			customerLastName: '',
			date: '',
			type: '',
        }
	},
	mounted: function() {
        this.getReservations();
        this.noResultInfo();
    },
    watch: {
    	customerFirstName: function(customer) {
            this.searchReservationsByCustomerFirstName(customer);
        },
    	customerLastName: function(customer) {
    		this.searchReservationsByCustomerLastName(customer);
    	},
        date: function(date) {
        	this.searchReservationsByDate(date);
        },
        type: function(type) {
        	this.searchReservationsByType(type);
        }
    },
	methods: {
		getType: function(to) {
			let now = moment(moment().format('YYYY-MM-DD'));

			return now.isBefore(to) ? '(active)' : '(inactive)'; 
		},
		getReservations: function() {
			this.clearForm();

			axios.post('/admin/api/getReservations', {
		        }).then((response) => {
		        	this.reservations = response.data;
		        }).catch(function (error) {
		        	//
		        });
		},
		searchReservationsByCustomerFirstName: function(customer) {
			if(customer) {
				let reservations = this.reservations;

				let result =  reservations.filter(function(index) {
					return index.customer.first_name.indexOf(customer.trim()) > -1;
				});

				this.reservations = result;
		    }
		},
		searchReservationsByCustomerLastName: function(customer) {
			if(customer) {
				let reservations = this.reservations;

				let result =  reservations.filter(function(index) {
					return index.customer.last_name.indexOf(customer.trim()) > -1;
				});

				this.reservations = result;
		    }
		},
		searchReservationsByDate: function(date) {
			if(date) {
				let reservations = this.reservations;

				let result =  reservations.filter(function(index) {
					return index.from.indexOf(date) > -1 || index.to.indexOf(date) > -1;
				});

				this.reservations = result;
		    }
		},
		searchReservationsByType: function(type) {
			if(type) {
				let reservations = this.reservations;

				let result =  reservations.filter(function(index) {
					return index.from.indexOf(type) > -1 || index.to.indexOf(type) > -1;
				});

				this.reservations = result;
	    	}
		},
		clearForm: function() {
			this.customerFirstName = '',
			this.customerLastName  = '',
			this.date              = '',
			this.type              = ''
		}
	},
}
</script>