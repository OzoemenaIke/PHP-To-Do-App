<?php

define("COLOR_RED", "\033[0;31m");
define("COLOR_GREEN", "\033[0;32m");
define("COLOR_YELLOW", "\033[1;33m");
define("COLOR_BLUE", "\033[0;34m");
define("COLOR_MAGENTA", "\033[0;35m");
define("COLOR_CYAN", "\033[0;36m");
define("COLOR_RESET", "\033[0m");

$todoList = array();

while (true) {

    echo COLOR_CYAN . "\nTo-Do List\n";
    echo COLOR_YELLOW . "1. Add task\n";
    echo "2. Mark task as complete\n";
    echo "3. List tasks\n";
    echo COLOR_RED . "4. Quit\n";
    echo COLOR_RESET . "Enter your choice: ";

    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case 1:
            echo COLOR_CYAN . "\nEnter task name: ";
            $taskName = trim(fgets(STDIN));
            $todoList[] = $taskName;
            echo COLOR_GREEN . "Task added successfully.\n";
            break;
        case 2:
            echo COLOR_CYAN . "\nEnter task number: ";
            $taskNumber = trim(fgets(STDIN));
            if (isset($todoList[$taskNumber-1])) {
                unset($todoList[$taskNumber-1]);
                echo COLOR_GREEN . "Task marked as complete.\n";
            } else {
                echo COLOR_RED . "Invalid task number.\n";
            }
            break;
        case 3:
            if (count($todoList) == 0) {
                echo COLOR_CYAN . "\nNo tasks in to-do list.\n";
            } else {
                echo COLOR_CYAN . "\nTo-Do List:\n";
                foreach ($todoList as $key => $value) {
                    echo COLOR_MAGENTA . ($key+1) . ". " . COLOR_RESET . $value . "\n";
                }
            }
            break;
        case 4:
            echo COLOR_RED . "\nGoodbye!\n";
            exit;
        default:
            echo COLOR_RED . "\nInvalid input.\n";
    }
}
