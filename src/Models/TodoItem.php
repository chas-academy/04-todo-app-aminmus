<?php

namespace Todo;

class TodoItem extends Model
{
    // Query Exection Format
    // methods: query($query); bind($param, $value); execute();
    // self::$db->method();

    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        // TODO: Implement me!
        // TODO: Do not allow empty string or whitespaces only
        
        $sql = 'INSERT INTO todos (title, created)
                VALUES (:title, now())';
        
        try {
            self::$db->query($sql);
            self::$db->bind(':title', $title);
            $result = self::$db->execute();
        } catch (\Exception $e) {
            showExceptionMessage($e);
        }
        return $result;
    }

    public static function updateTodo($todoId, $title, $completed = null)
    {
        // Update a specific todo

        $sql = 'UPDATE todos SET title = :title, completed = :completed WHERE id = :todoId';

        try {
            self::$db->query($sql);
            self::$db->bind(':todoId', $todoId);
            self::$db->bind(':title', $title);
            self::$db->bind(':completed', $completed);
            $result = self::$db->execute();
        } catch (\Exception $e) {
            showExceptionMessage($e);
        }
        return $result;
    }

    public static function deleteTodo($todoId)
    {
        // Delete a specific todo

        $sql = 'DELETE FROM todos WHERE id = :todoId';

        try {
            self::$db->query($sql);
            self::$db->bind(':todoId', $todoId);
            self::$db->execute();
        } catch (\Exception $e) {
            showExceptionMessage($e); // Will only be visible if page is not redirected via TodoController
        }
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
