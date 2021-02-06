<script>
	$(document).ready(function () {
	$('#saveItem').on('submit', function(e) {
	$(".formSaving").html('Processing..<i class="fas fa-spin fa-spinner"></i>');
	e.preventDefault();
	var tag, data;
	tag = $(this);
	data = tag.serialize();
	axios.post('{{ route('items.api.save') }}', data)
	.then(function (response) {
		$('#cr-details tbody').prepend(response.data.html);
		updateTotals(response.data.data);
		$('#auto-item-name').val("");
		toastr.info( response.data.message , '@langapp('response_status')');
		$(".formSaving").html('<i class="fas fa-check"></i> @langapp('save')');
		tag[0].reset();
	})
	.catch(function (error) {
		var errors = error.response.data.errors;
		var errorsHtml= '';
		$.each( errors, function( key, value ) {
			errorsHtml += '<li>' + value[0] + '</li>';
		});
		toastr.error( errorsHtml , '@langapp('response_status')');
		$(".formSaving").html('<i class="fas fa-sync"></i> Try Again');
	});
});
	$('#cr-details tbody').on('click', '.deleteItem', function (e) {
e.preventDefault();
var tag, id;
tag = $(this);
id = tag.data('item-id');
if(!confirm('Do you want to delete this message?')) {
return false;
}
axios.delete('/api/v1/items/'+id, {
	"id": id
})
	.then(function (response) {
	toastr.warning( response.data.message , '@langapp('response_status')');
	updateTotals(response.data.data);
	$('#auto-item-name').val("");
	$('#item-' + id).hide(500, function () {
		$(this).remove();
	});
	})
	.catch(function (error) {
		toastr.error('Oops! Request failed to complete.', '@langapp('response_status')');
	});
});
function updateTotals(response) {
	$('#cr-balance').html(response.balance);
	$('#cr-subtotal').html(response.subtotal);
	$('#cr-used').html(response.used);
	$('#cr-tax').html(response.tax);
}
});
</script>