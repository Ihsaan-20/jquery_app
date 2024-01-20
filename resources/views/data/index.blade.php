<table id="data-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <!-- Add more table headers based on your data -->
        </tr>
    </thead>
    <tbody>
        <!-- Table body will be populated dynamically -->
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>      
$(document).ready(function() {

    $.ajax({
        url: '/data',
        type: 'GET',
        success: function(response) {
            // Loop through the response data and populate the table
            response.forEach(function(data) {
                $('#data-table tbody').append(`
                    <tr>
                        <td>${data.title}</td>
                        <td>${data.description}</td>
                    
                    </tr>
                `);
            });
        },
        error: function(xhr) {
            console.log(xhr.responseText); // Handle error, if any
        }
    });
});
    </script>
