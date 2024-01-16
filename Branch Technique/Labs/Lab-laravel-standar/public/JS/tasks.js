$(document).ready(function() {
    function fetchData(page, searchValue, projetId) {
        // Choose either requestUrl or requestUr2
        var requestUrl = "{{ url('projects') }}/tasks/" + projetId + "?page=" + page + "&searchValue=" +
            searchValue;

        console.log("Request URL:", requestUrl);

        $.ajax({
            url: requestUrl,
            success: function(data) {

                if (data == 'false') {
                    // No results found, display a message
                    $('tbody').html('<tr><td colspan="4">No results found</td></tr>');
                } else {
                    $('tbody').html('');
                    $('tbody').html(data);
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
            }
        });
    }

    $('body').on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        var searchValue = $('#search-input').val();
        var projectId = $('#projectId').val();

        fetchData(page, searchValue, 1);
    });

    $('body').on('keyup', '#search-input', function() {

        var page = 1;
        var searchValue = $('#search-input').val();
        var projectId = $('#projectId').val();

        console.log(searchValue);
        fetchData(page, searchValue, 1);
    });
});


function deleteTask(taskId) {
    document.getElementById('deleteForm').action = "{{ route('tasks.destroy', ':taskId') }}".replace(':taskId',
        taskId);
}
