import {url} from "../app";
const app = new Vue({
	el: '#giftcards',
	methods: {
		deleteGiftcard: function (id) {
			this.$http.delete(`${url}giftcards/${id}`).then(res => {
				alert(res.data.result);
				location.reload();
			});
		}
	}
});