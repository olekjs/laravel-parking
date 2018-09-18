<template>
	<div>
		<div class="card mb-2">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<label for="type">Select type:</label>
						<select type="text" id="type" v-model="type" class="custom-select">
							<option value="active">Active</option>
							<option value="inactive">Inactive</option>
							<option value="deleted">Deleted</option>
						</select>
					</div>
					<div class="col-md-3">
						<label for="customer">Type customer:</label>
						<input type="text" id="customer" v-model="customer" class="form-control">
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
		<table class="table table-middle-aligned table-hover">
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
	    		<td>{{ reservation.to }}</td>
	    		<td>{{ reservation.created_at }}</td>
	    		<td>{{ reservation.payment_status }}</td>
	    		<td>{{ reservation.customer.phone }}</td>
	    		<td>{{ reservation.customer.email }}</td>
	    		<td><a :href="'/admin/reservation/show/' + reservation.id" class="btn btn-secondary"> Manage</a></td>
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
export default {
    data: function() {
        return {
			reservations: [],
			customer: '',
			date: '',
			type: ''
        }
	},
	mounted: function() {
        this.getReservations();
    },
    watch: {
        customer: function(customer) {
            this.searchReservationsByCustomer(customer);
        },
        date: function(date) {
        	this.searchReservationsByDate(date);
        }
    },
	methods: {
		getReservations: function() {
		axios.post('/admin/api/getReservations', {
	        }).then((response) => {
	        	this.reservations = response.data;
	        }).catch(function (error) {
	        	//
	        });
		},
		searchReservationsByCustomer: function(customer) {
		axios.get('/admin/api/searchReservationsByCustomer', {
	            params: {
	            	customer: customer,
	            }
	        }).then((response) => {
	        	this.reservations = response.data;
	        }).catch(function (error) {
	        	//
	        });
		},
		searchReservationsByDate: function(date) {
		axios.get('/admin/api/searchReservationsByDate', {
	            params: {
	            	date: date
	            }
	        }).then((response) => {
	        	this.reservations = response.data;
	        }).catch(function (error) {
	        	//
	        });
		},
	}
}
</script>