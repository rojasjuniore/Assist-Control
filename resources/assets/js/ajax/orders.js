import {url} from "../app";
const app = new Vue({
	el: '#orders',
	methods: {
		deliverOrder: function (id) {
			this.$http.put(`${url}orders/deliver/${id}`).then(res => {
				alert(res.data.result);
				location.reload();
			});
		}, 
		deleteOrder: function (id) {
			this.$http.delete(`${url}orders/${id}`).then(res => {
				alert(res.data.result);
				location.reload();
			});
		}
	}
});