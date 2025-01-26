<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS System Documentation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/5.1.0/github-markdown.min.css">
    <style>
        .markdown-body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 45px;
        }

    </style>
</head>
<body class="markdown-body">
    @php
    // Include Parsedown
    require base_path('vendor/erusev/parsedown/Parsedown.php');

    // Path to the README.md file
    $readmePath = base_path('README.md');

    // Check if the file exists
    if (!file_exists($readmePath)) {
    die('README.md file not found.');
    }

    // Read the file content
    $content = file_get_contents($readmePath);

    // Convert Markdown to HTML
    $parsedown = new Parsedown();
    echo $parsedown->text($content);
    @endphp
</body>
</html>
