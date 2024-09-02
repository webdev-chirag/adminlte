<script>
    function showToast(icon,message){
        Swal.fire({
            icon:icon,
            title:message,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
    }
</script>
@if($message=Session::get('error'))
    <script>
        showToast('error','{{ $message }}')
    </script>
@endif
@if($message=Session::get('success'))
    <script>
        showToast('success','{{ $message }}')
    </script>
@endif
@if($message=Session::get('warning'))
    <script>
        showToast('warning','{{ $message }}')
    </script>
@endif
@if($message=Session::get('info'))
    <script>
        showToast('info','{{ $message }}')
    </script>
@endif
@if($message=Session::get('question'))
    <script>
        showToast('question','{{ $message }}')
    </script>
@endif

