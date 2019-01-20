<?php

namespace Todo;

class TodoItem extends Model
{
    // Query Exection Format
    // methods: query($query); bind($param, $value); execute();
    // self::$db->method();

    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    // public static function createTodo($title)
    // {
    //     // TODO: Implement me!
    //     // Create a new todo
    // }

    // // public static function updateTodo($todoId, $title, $completed = null)
    // // {
    // //     // TODO: Implement me!
    // //     // Update a specific todo
    // // }

    public static function deleteTodo($todoId)
    {
        // TODO: Implement me!
        // TODO: Change so deletion occurs with POST instead of GET
        // Delete a specific todo

        $sql = 'DELETE FROM todos WHERE id = :todoId';
        
        self::$db->query($sql);
        self::$db->bind(':todoId', $todoId);
        self::$db->execute();
    }
    
    // (Optional bonus methods below)
    // public static function toggleTodos($completed)
    // {
    //     // TODO: Implement me!
    //     // This is to toggle all todos either as completed or not completed
    // }

    // public static function clearCompletedTodos()
    // {
    //     // TODO: Implement me!
    //     // This is to delete all the completed todos from the database
    // }
}
