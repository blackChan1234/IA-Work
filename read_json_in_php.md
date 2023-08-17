https://tools.wingzero.tw/article/sn/865
Sure, here's an example of how you can use PHP to fetch a JSON file, decode its content, and then display the data as a list:

Assuming you have a JSON file named `data.json` with the following content:

```json
[
    {
        "name": "Item 1",
        "description": "Description for Item 1"
    },
    {
        "name": "Item 2",
        "description": "Description for Item 2"
    },
    {
        "name": "Item 3",
        "description": "Description for Item 3"
    }
]
```

You can use the following PHP code to fetch and display the data:

```php
<?php
// Read the JSON file
$jsonData = file_get_contents('data.json');

// Decode the JSON data into an array
$data = json_decode($jsonData, true);

// Check if decoding was successful
if ($data === null) {
    echo "Error decoding JSON data.";
} else {
    echo '<ul>';
    foreach ($data as $item) {
        echo '<li>';
        echo '<strong>Name:</strong> ' . $item['name'] . '<br>';
        echo '<strong>Description:</strong> ' . $item['description'];
        echo '</li>';
    }
    echo '</ul>';
}
?>
```

This code reads the JSON file using `file_get_contents`, decodes it using `json_decode`, and then iterates through the data to display it as an unordered list (`<ul>`). Each item's name and description are displayed within a list item (`<li>`).

Make sure to adjust the file paths and URLs according to your file structure and server configuration.
