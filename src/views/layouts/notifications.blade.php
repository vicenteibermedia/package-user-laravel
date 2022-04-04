
<script type="text/javascript">
const Toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 5000,
	timerProgressBar: true,
	didOpen: (toast) => {
		toast.addEventListener('mouseenter', Swal.stopTimer)
		toast.addEventListener('mouseleave', Swal.resumeTimer)
	}
});
</script>
@if ($message = Session::get('success'))
	<script>
	Toast.fire({
          position: 'top',
          icon: 'success',
          title: '{{$message}}',
          showConfirmButton: false,
        })
	</script>
{{ Session::forget('success') }}
@endif

@if ($message = Session::get('error'))
	<script>
	Toast.fire({
					position: 'top',
					icon: 'error',
					title: '{{$message}}',
					showConfirmButton: false,
				})
	</script>
{{ Session::forget('error') }}
@endif

@if ($message = Session::get('warning'))
	<script>
	Toast.fire({
					position: 'top',
					icon: 'warning',
					title: '{{$message}}',
					showConfirmButton: false,
				})
	</script>
{{ Session::forget('warning') }}
@endif

@if ($message = Session::get('notice'))
	<script>
	Toast.fire({
					position: 'top',
					icon: 'notice',
					title: '{{$message}}',
					showConfirmButton: false,
				})
	</script>
@endif

@if ($message = Session::get('info'))
	<script>
	Toast.fire({
					position: 'top',
					icon: 'info',
					title: '{{$message}}',
					showConfirmButton: false,
				})
	</script>
{{ Session::forget('info') }}
@endif
