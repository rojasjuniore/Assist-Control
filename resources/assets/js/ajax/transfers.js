import {url} from "../app";
const app = new Vue({
	el: '#transfers',
	methods: {
		refundTransfer: function (id) {
			this.$http.put(`${url}transfers/refund/${id}`).then(res => {
				alert(res.data.result);
				// location.reload();
			});
		}
	}
});