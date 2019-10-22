import {url} from "../app";
const app = new Vue({
	el: '#accounts',
	methods: {
		deleteAccount: function (id) {
			this.$http.delete(`${url}bank-accounts/${id}`).then(res => {
				alert(res.data.result);
				location.reload();
			});
		}
	}
});