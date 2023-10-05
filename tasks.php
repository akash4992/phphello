<?php
phpinfo();

// Function to display tasks
function displayTasks() {
    $taskList = [];
    echo "hello";
    // Check if a file with tasks exists
    if (file_exists('tasks.txt')) {
        $taskList = file('tasks.txt', FILE_IGNORE_NEW_LINES);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
        // Add a new task
        $newTask = trim($_POST['task']);
        if (!empty($newTask)) {
            $taskList[] = $newTask;
            file_put_contents('tasks.txt', implode(PHP_EOL, $taskList));
        }
    }

    // Display tasks
    foreach ($taskList as $task) {
        echo "<li>$task</li>";
    }
}
?>
