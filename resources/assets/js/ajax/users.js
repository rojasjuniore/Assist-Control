import {url} from "../app";
const app = new Vue({
	el: '#users',
	methods: {
		deleteUser: function (id) {
			this.$http.delete(`${url}users/${id}`).then(res => {
				alert(res.data.result);
				location.reload();
			});
		}
	}
});