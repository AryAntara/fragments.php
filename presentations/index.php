<?php
// Start the timer at the very beginning of the script
$start_time = microtime(true);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Load Time Example</title>
</head>

<body>

    <!-- Your HTML and dynamic PHP content here -->
    <h1>Hello World!</h1>
    <p>This is some content.</p>

    <b>USER:</b>
    <div id="user-data"></div>
    <button>Retrieve User Data</button>

    <script>
        let button = document.querySelector('button');

        button.onclick = () =>
            fetch('http://localhost:8000/user')
                .then(response => response.json())
                .then(user => {
                    document.getElementById('user-data').innerHTML +=
                        `<p> ID: ${user.id}, Name: ${user.name}, Phone: ${user.email}</p>`;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
    </script>
</body>

</html>