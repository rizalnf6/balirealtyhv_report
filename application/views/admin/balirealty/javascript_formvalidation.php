<script type="text/javascript">
	function validate() {

		if (document.MyForm.checkin.value > document.MyForm.checkout.value) {
			alert("Checkin date more than checkout date");
			document.MyForm.checkin.focus();
			return false;
		}

		if (document.MyForm.status_enquiry_id.value=='8' && document.MyForm.cancelation_id.value=='') {
			alert("Please choose the cancelation reason");
			document.MyForm.cancelation_id.focus();
			return false;
		}

		if (document.MyForm.status_enquiry_id.value=='5' && document.MyForm.payment_id.value=='') {
			alert("Please choose the payment status");
			document.MyForm.payment_id.focus();
			return false;
		}

		if (document.MyForm.status_enquiry_id.value=='5' && document.MyForm.confirm_date.value=='') {
			alert("Please fill the confirm date");
			document.MyForm.confirm_date.focus();
			return false;
		}

		if (document.MyForm.status_enquiry_id.value=='6' && document.MyForm.payment_id.value=='') {
			alert("Please choose the payment status");
			document.MyForm.payment_id.focus();
			return false;
		}

		if (document.MyForm.status_enquiry_id.value=='6' && document.MyForm.confirm_date.value=='') {
			alert("Please fill the confirm date");
			document.MyForm.confirm_date.focus();
			return false;
		}

		if (document.MyForm.status_enquiry_id.value=='9' && document.MyForm.payment_id.value=='') {
			alert("Please choose the payment status");
			document.MyForm.payment_id.focus();
			return false;
		}

		if (document.MyForm.status_enquiry_id.value=='9' && document.MyForm.confirm_date.value=='') {
			alert("Please fill the confirm date");
			document.MyForm.confirm_date.focus();
			return false;
		}

	}
</script>