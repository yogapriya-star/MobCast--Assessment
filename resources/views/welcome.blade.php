<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
   
    <title>MobCast-Assessment</title>
    <style>
        .news-image {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-2">
        <div class="row text-center">
            <h2>MobCast-Assessment</h2>
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>NEWS Link</th>
                        <th>Publish Date</th>
                        <th>NEWS Image</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be populated here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    
    <script>
        $(document).ready(function () {
            const table = $('#myTable').DataTable();

            $.ajax({
                url: "/api/news",
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    const newsItems = data.channel.item;
                    newsItems.forEach(item => {
                        // Create a temporary element to parse the HTML content
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = item.description;

                        // Extract the text content from the temporary element
                        const plainDescription = tempDiv.textContent || tempDiv.innerText || "";

                        // Extract the image src from the description
                        const imgTag = tempDiv.querySelector('img');
                        const imageUrl = imgTag ? imgTag.src : '';

                        table.row.add([
                            item.title,
                            plainDescription,
                            `<a href="${item.link}" target="_blank">${item.link}</a>`,
                            item.pubDate,
                            `<img src="${imageUrl}" alt="News Image" class="news-image">`
                        ]).draw(false);
                    });
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    </script>
</body>
</html>
