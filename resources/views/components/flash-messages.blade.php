@if(Session::has('message'))
    <script>
        window.addEventListener('load', () =>
            showNotification("{{ __('Notification') }}", "{{ Session::get('message') }}", 'success')
        );
    </script>
@endif

@if(Session::has('error'))
    <script>
        window.addEventListener('load', () =>
            showNotification("{{ __('Error!') }}", "{{ Session::get('error') }}", 'error')
        );
    </script>
@endif

<x-bladewind::notification position="bottom right"/>
