<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    window.pageLink = function(url) {
        $.get(url,{},function(data,status) {
            $('#content').html(data)
        })  
    }

</script>